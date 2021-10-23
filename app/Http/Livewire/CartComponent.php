<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{
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

    public function render()
    {
        return view('livewire.cart-component')
        ->layout('layouts.base');
    }
}
