<div>
    <style>
        nav svg{
            height: 20px;
        }

        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;"">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Category
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.categories') }}" class="btn btn-success pull-right">Todas las Categorias</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateCategory">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nombre Categoria</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Nombre Categoria" class="form-control input-md"
                                        wire:model="name" wire:keyup="generateslug">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Categoria Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Categoria Slug" class="form-control input-md" wire:model="slug">
                                    @error('slug')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('home') }}">
                                        <button class="btn btn-default btn-close">Cancel</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
