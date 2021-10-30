<main id="main" class="main-site">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">Inicio</a></li>
                <li class="item-link"><span>Registro</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <form wire:submit.prevent="placeOrder">
                <div class="row">
                    <div class="col-md-12">
                        {{-- Datos del Comprador y de Envío --}}
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Datos del Comprador y de Envío</h3>
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname">Nombres<span>*</span></label>
                                    <input id="fname" type="text" name="fname" value="" placeholder="Nombres" wire:model="firstname">
                                    @error('firstname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">Apellidos<span>*</span></label>
                                    <input id="lname" type="text" name="lname" value="" placeholder="Apellidos" wire:model="lastname">
                                    @error('lastname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Correo Electrónico:</label>
                                    <input id="email" type="email" name="email" value="" placeholder="Correo Electrónico" wire:model="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Número Contacto<span>*</span></label>
                                    <input id="phone" type="number" name="phone" value="" placeholder="Número Contacto" wire:model="mobile">
                                    @error('mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Dirección 1:</label>
                                    <input id="add" type="text" name="line1" value="" placeholder="Dirección:" wire:model="line1">
                                    @error('line1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Dirección 2:</label>
                                    <input id="add" type="text" name="line2" value="" placeholder="Dirección:" wire:model="line2">
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Departamento<span>*</span></label>
                                    <input id="country" type="text" name="country" value="" placeholder="Departamento" wire:model="country">
                                    @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Provincia<span>*</span></label>
                                    <input id="city" type="text" name="province" value="" placeholder="Provincia" wire:model="province">
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Ciudad<span>*</span></label>
                                    <input id="city" type="text" name="city" value="" placeholder="Ciudad" wire:model="city">
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Código Postal:</label>
                                    <input id="zip-code" type="number" name="zip-code" value="" placeholder="Código Postal" wire:model="zipcode">
                                    @error('zipcode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form fill-wife">
                                            {{-- <label class="checkbox-field">
                                                <input name="create-account" id="create-account" value="forever" type="checkbox">
                                                <span>¿Crear una Cuenta?</span>
                                            </label> --}}
                                    <label class="checkbox-field">
                                        <input name="different-add" id="different-add" value="1" type="checkbox"
                                            wire:model="ship_to_different">
                                        <span>¿Enviar a una Dirección Diferente?</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                        {{-- End Datos del Comprador y de Envío --}}
                        {{-- Nueva Dirección de Envío< --}}
                    </div>
                    @if ($ship_to_different)
                        <div class="col-md-12">
                            <div class="wrap-address-billing">
                                <h3 class="box-title">Nueva Dirección de Envío</h3>
                                <div class="billing-address">
                                    <p class="row-in-form">
                                        <label for="fname">Nombres<span>*</span></label>
                                        <input id="fname" type="text" name="fname" value="" placeholder="Nombres" wire:model="s_firstname">
                                        @error('s_firstname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="lname">Apellidos<span>*</span></label>
                                        <input id="lname" type="text" name="lname" value="" placeholder="Apellidos" wire:model="s_lastname">
                                        @error('s_lastname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="email">Correo Electrónico:</label>
                                        <input id="email" type="email" name="email" value="" placeholder="Correo Electrónico" wire:model="s_email">
                                        @error('s_email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="phone">Número Contacto<span>*</span></label>
                                        <input id="phone" type="number" name="phone" value="" placeholder=">Número Contacto" wire:model="s_mobile">
                                        @error('s_mobile')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">Dirección 1:</label>
                                        <input id="add" type="text" name="s_linea1" value="" placeholder="Dirección 1:" wire:model="s_line1">
                                        @error('s_line1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">Dirección 2:</label>
                                        <input id="add" type="text" name="s_linea2" value="" placeholder="Dirección 2:" wire:model="s_line2">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="country">Departamento<span>*</span></label>
                                        <input id="country" type="text" name="country" value="" placeholder="Departamento" wire:model="s_country">
                                        @error('s_country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="country">Provincia<span>*</span></label>
                                        <input id="country" type="text" name="provincia" value="" placeholder="Provincia" wire:model="s_province">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="city">Ciudad<span>*</span></label>
                                        <input id="city" type="text" name="city" value="" placeholder="Ciudad" wire:model="s_city">
                                        @error('s_city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="zip-code">Código Postal:</label>
                                        <input id="zip-code" type="number" name="zip-code" value="" placeholder="Código Postal" wire:model="s_zipcode">
                                        @error('s_zipcode')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </p>
                                </div>
                            </div>
                            {{-- End Nueva Dirección de Envío< --}}
                        </div>
                    @endif

                </div>

                <div class="summary summary-checkout">
                    <div class="summary-item payment-method">
                        <h4 class="title-box">Métodos de Pago</h4>
                        <p class="summary-info"><span class="title">Check / Money order</span></p>
                        <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                        <div class="choose-payment-methods">
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-bank" value="bank" type="radio" wire:model="paymentmethod">
                                <span>Pago Contra Entrega</span>
                                <span class="payment-desc">Ordene ahora y pague contra entrega</span>
                            </label>
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmethod">
                                <span>Débito - Crédito</span>
                                <span class="payment-desc"></span>
                            </label>
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model="paymentmethod">
                                <span>Paypal</span>
                                <span class="payment-desc">You can pay with your credit</span>
                                <span class="payment-desc">card if you don't have a paypal account</span>
                            </label>
                            @error('paymentmethod')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @if (Session::has('checkout'))
                            <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{ Session::get('checkout'),['total'] }}</span></p>
                        @endif

                        {{-- <a href="thankyou.html" class="btn btn-medium">Place order now</a> --}}
                        <button type="submit" class="btn btn-medium">Realice su Orden Ahora</button>

                    </div>
                    <div class="summary-item shipping-method">
                        <h4 class="title-box f-title">Método de Envío</h4>
                        <p class="summary-info"><span class="title">Tarifa Plana</span></p>
                        <p class="summary-info"><span class="title">Reparado $0.00</span></p>
                       {{--  <h4 class="title-box">Discount Codes</h4>
                        <p class="row-in-form">
                            <label for="coupon-code">Enter Your Coupon code:</label>
                            <input id="coupon-code" type="text" name="coupon-code" value="" placeholder="">
                        </p>
                        <a href="#" class="btn btn-small">Apply</a> --}}
                    </div>
                </div>
            </form>
            {{-- Most Viewed Products --}}
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Most Viewed Products</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{ asset('assets/images/products/digital_4.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{ asset('assets/images/products/digital_17.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item sale-label">sale</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{ asset('assets/images/products/digital_15.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                        <span class="flash-item sale-label">sale</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{ asset('assets/images/products/digital_1.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item bestseller-label">Bestseller</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{ asset('assets/images/products/digital_21.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{ asset('assets/images/products/digital_3.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item sale-label">sale</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{ asset('assets/images/products/digital_4.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>

                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="{{ asset('assets/images/products/digital_5.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item bestseller-label">Bestseller</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="#" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                </div>
                            </div>
                        </div>
                    </div><!--End wrap-products-->
                </div>
            {{-- End Most Viewed Products --}}
        </div><!--end main content area-->

    </div><!--end container-->

</main>
