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
                                Agregar Nuevo Producto
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.products') }}" class="btn btn-info pull-right">Todos los Productos</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addProduct">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nombre</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Nombre" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Producto Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Producto Slug" class="form-control input-md" wire:model="slug"/>
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Descripción Corta</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea cols="30" id="short_description" rows="3" class="form-control"
                                        placeholder="Descripción Corta" wire:model="short_description">
                                    </textarea>
                                    @error('short_description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Descripción</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea cols="30" id="descripction" rows="5" class="form-control"
                                        placeholder="Descripción" wire:model="description">
                                    </textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Precio Regular</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Precio Regular" class="form-control input-md" wire:model="regular_price" />
                                    @error('regular_price')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Precio Venta</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Precio Venta" class="form-control input-md" wire:model="sale_price"/>
                                    @error('sale_price')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">SKU</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU"/>
                                    @error('SKU')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Stock</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="stock_status">
                                        <option value="instock">Instock</option>
                                        <option value="outofstock">Outofstock</option>
                                    </select>
                                    @error('stock_status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Feature</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Cantidad</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Cantidad" class="form-control input-md" wire:model="quantity"/>
                                    @error('quantity')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Imagen</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="image"/>
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" width="120" />
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Categoria</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category )
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(function(){
        tinymce.init({
            selector:'#short_description',
            setup:function(editor){
                editor.on('Change', function(e){
                    tinyMCE.triggerSave();
                    var sd_data = $('#short_description').val();
                    @this.set('short_description',sd_data);
                });
            }
        });

        tinymce.init({
            selector:'#description',
            setup:function(editor){
                editor.on('Change', function(e){
                    tinyMCE.triggerSave();
                    var d_data = $('#description').val();
                    @this.set('description',d_data);
                });
            }
        });
    });



  </script>
@endpush

