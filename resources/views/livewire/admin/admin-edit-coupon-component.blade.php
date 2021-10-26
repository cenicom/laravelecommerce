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
                                Editar Cupon
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.coupons') }}" class="btn btn-success pull-right">Todos los Cupones</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updatedCoupon">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Código:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Código..." class="form-control input-md"
                                    wire:model="code"/>
                                    @error('code')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Typo Cupon:</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="type">
                                        <option value="">Seleccionar</option>
                                        <option value="fixed">Reparado</option>
                                        <option value="percent">Porcentaje</option>
                                    </select>
                                    @error('code')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Valor Cupon:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Valor Cupon..." class="form-control input-md"
                                    wire:model="value"/>
                                    @error('value')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Valor Carrito:</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Valor Carrito..." class="form-control input-md"
                                    wire:model="cart_value"/>
                                    @error('cart_value')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Fecha Expiración:</label>
                                <div class="col-md-4">
                                    <input type="text" id="expire_date" name="expire_date" placeholder="Fecha Expiración..." class="form-control input-md"
                                    wire:model="expire_date"/>
                                    @error('cart_value')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{url()->previous()}}" class="btn btn-success">Regresar</a>
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
            $('#expire_date').datetimepicker({
                format : 'Y-MM-DD h:m:s',
            })
            .on('dp.change',function(ev){
                var data = $('#sexpire_date').val();
                @this.set('expire_date',data);
            });
        });
    </script>
@endpush

