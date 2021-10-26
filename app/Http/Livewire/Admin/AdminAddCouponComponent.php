<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminAddCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expire_date;

    public function storeCoupon()
    {
        # code...
        $rules = [
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expire_date' => 'required'
        ];

        $coupon = new Coupon();

        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->expire_date = $this->expire_date;

        $coupon->save();

        session()->flash('message','Cupon Creado Correctamente');
    }

    public function updated($fields)
    {
        # code...
        $rules = [
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expire_date' => 'required'
        ];
    }

    public function render()
    {
        return view('livewire.admin.admin-add-coupon-component')
        ->layout('layouts.base');
    }
}
