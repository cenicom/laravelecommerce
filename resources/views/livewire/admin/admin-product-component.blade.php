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
                                Todos los Productos
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.addproduct') }}" class="btn btn-success pull-right">Adicionar Nuevo Registro</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Imagen</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Precio Regular</th>
                                    <th>Precio Venta</th>
                                    <th>Categoria</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><img src="{{ asset('assets/images/products') }}/{{ $product->image }}" width="60" /></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->stock_status }}</td>
                                        <td>${{ $product->regular_price }}</td>
                                        <td>${{ $product->sale_price }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.editproducts',['product_slug'=>$product->slug]) }}">
                                                <i class="fa fa-edit fa-2x"></i>
                                            </a>
                                            <a href="#" onclick="confirm('Are you Sure, You Want to Delete this Record?') || event.stopInmediatePropagation()"
                                            wire:click.prevent="destroy('{{ $product->id }}')" style="margin-left: 10px">
                                                <i class="fa fa-trash fa-2x text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

