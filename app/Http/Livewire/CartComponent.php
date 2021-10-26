<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Coupon;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{
    public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    public function calculateDiscounts()
    {
        # code...
        if(session()->has('coupon')){
            if(session()->get('coupon')['type'] == 'fixed'){
                $this->discount = session()->get('coupon')['value'];
            }else{
                $this->discount = (
                    Cart::intance('cart')
                ->subtotal() * session()
                ->get('coupon')['value']
                ) /100;
            }

            $this->subtotalAfterDiscount = Cart::instance('cart')
            ->subotal() - $this->discount;

            $this->taxAfterDiscount = (
                $this->subtotalAfterDiscount * config('cart.tax')
            )/100;

            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
        }
    }

    public function applyCouponCode()
    {
        # code...
        $coupon = Coupon::where(
            'code',$this->couponCode)
            ->where(
                'expire_date',
                '>=',
                Carbon::today())
            ->where(
                'cart_valud',
                '<=',
                Cart::instance('cart')
                ->subtotal()
            )
            ->first();

        if (!$coupon){
            session()->flash('coupon_message','Invalidado el Código del Cupon');

            return;
        }

        session()->put('coupon',[
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value,
        ]);

    }

    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);

        $qty = $product->qty + 1;

        Cart::update($rowId,$qty);

        $this->emitTo(
            'cart-count-component',
            'refreshComponent'
        );
    }

    public function decreaseQuantity($rowId)
    {
        # code..
        $product = Cart::instance('cart')->get($rowId);

        $qty = $product->qty - 1;

        Cart::instance('cart')->update($rowId,$qty);

        $this->emitTo(
            'cart-count-component',
            'refreshComponent'
        );
    }

    public function destroy($rowId)
    {
        # code...
        Cart::instance('cart')->remove($rowId);

        $this->emitTo(
            'wishlist-count-component',
            'refreshComponent'
        );

        session()->flash('success_message','Item Eliminado Correctamente del Carrito de Compras');
    }

    public function destroyAll()
    {
        # code...
        Cart::destroy();

        $this->emitTo(
            'wishlist-count-component',
            'refreshComponent'
        );
    }

    public function switchToSaveForLater($rowId)
    {
        # code...
        $item = Cart::instance('cart')->get($rowId);

        Cart::instance('cart')->remove($rowId);

        Cart::instance('saveForLater')
        ->add(
            $item->id,
            $item->name,
            1,
            $item->price
        )
        ->associate(
            'App\Models\Product'
        );

        $this->emitTo(
            'cart-count-component',
            'refreshComponent'
        );

        session()->flash('success_message','Item Ha Sido Grabado para Más Tarde');
    }

    public function moveToCart($rowId)
    {
        # code...
        $item = Cart::instance('saveForLater')->get($rowId);

        Cart::instance('saveForLater')->remove($rowId);

        Cart::instance('cart')
        ->add(
            $item->id,
            $item->name,
            1,
            $item->price
        )
        ->associate(
            'App\Models\Product'
        );

        $this->emitTo(
            'cart-count-component',
            'refreshComponent'
        );

        session()->flash('s_success_message','Item Ha Sido Movido al Carrito');
    }

    public function deleteFromSaveForLater($rowId)
    {
        # code...
        Cart::instance('saveForLater')->remove($rowId);

        session()->flash('s_success_message','Item Ha Sido Eliminado del Carrito');
    }

    public function removeCoupon()
    {
        # code...
        session()->forget('coupon');
    }

    public function render()
    {
        if(session()->has('coupon')){
            if(Cart::instance('cart')
            ->subtotal < session()->get('coupon')['cart_value']){
                session()->forget('coupon');
            }else{
                $this->calculateDiscounts();
            }
        }

        return view('livewire.cart-component')
        ->layout('layouts.base');
    }
}
