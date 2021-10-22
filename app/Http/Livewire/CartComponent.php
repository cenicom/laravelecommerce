<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);

        $qty = $product->qty + 1;

        Cart::update($rowId,$qty);
    }

    public function decreaseQuantity($rowId)
    {
        # code..
        $product = Cart::get($rowId);

        $qty = $product->qty - 1;

        Cart::update($rowId,$qty);
    }

    public function destroy($rowId)
    {
        # code...
        Cart::remove($rowId);

        session()->flash('success_message','Item Eliminado Correctamente del Carrito de Compras');
    }

    public function destroyAll()
    {
        # code...
        Cart::destroy();
    }

    public function render()
    {
        return view('livewire.cart-component')
        ->layout('layouts.base');
    }
}
