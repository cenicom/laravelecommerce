<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminEditCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expire_date;
    public $coupon_id;

    public function mount($coupon_id)
    {
        # code...
        $coupon = Coupon::find($coupon_id);

        $this->code = $coupon->code;
        $this->type = $coupon->type;
        $this->value = $coupon->value;
        $this->cart_value = $coupon->cart_value;
        $this->expire_date = $coupon->expire_date;
        $this->coupon_id = $coupon->id;
    }

    public function updatedCoupon()
    {
        # code...
        $rules = [
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expire_date' => 'required'
        ];

        $coupon = Coupon::find($this->coupon_id);

        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->expire_date = $this->expire_date;

        $coupon->save();

        session()->flash('message','Cupon Actualizado Correctamente');
    }

    /* public function updated()
    {
        # code...
        $rules = [
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric'
        ];
    } */

    public function render()
    {
        return view('livewire.admin.admin-edit-coupon-component')
        ->layout('layouts.base');
    }
}
