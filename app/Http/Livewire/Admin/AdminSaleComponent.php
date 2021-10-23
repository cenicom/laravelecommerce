<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sale;
use Livewire\Component;
use Cart;

class AdminSaleComponent extends Component
{
    public $sale_date;
    public $status;

    public function mount()
    {
        # code...
        $sale = Sale::find(1);

        $this->sale_date = $sale->sale_date;
        $this->status = $sale->status;
    }

    public function store($product_id,$product_name,$product_price)
    {
        # code...
        Cart::add(
            $product_id,
            $product_name,
            1,
            $product_price
        )
        ->associte(
            'App\Models\Product'
        );

        session()->flash('success_message','Item Agregado al Carrito');

        return redirect()->route('product.cart');
    }

    public function updateSale()
    {
        # code...
        $sale = Sale::find(1);

        $sale->sale_date = $this->sale_date;

        $sale->status = $this->status;

        $sale->save();

        session('message','Sale Settings Has Been Updated Successfuly¡');
    }

    public function render()
    {
        return view('livewire.admin.admin-sale-component')
        ->layout('layouts.base');
    }
}
