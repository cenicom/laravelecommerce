<div>
    <style>
        nav svg{
            height: 20px;
        }

        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Todas las Categorias
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addcategories') }}" class="btn btn-info pull-right">Agregar Nuevo Registro</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre Categoria</th>
                                    <th>Slug</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category )
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <a href="{{ route('admin.editcategories',['category_slug'=>$category->slug]) }}">
                                                <i class="fa fa-edit fa-2x"></i>
                                            </a>
                                            <a href="#" onclick="confirm('Are you Sure, You Want to Delete this Record?') || event.stopInmediatePropagation()"
                                                wire:click.prevent="destroy('{{ $category->id }}')" style="margin-left: 10px">
                                                <i class="fa fa-trash fa-2x text-danger" ></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
