<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminCouponsComponent extends Component
{
    public function destroy($coupon_id)
    {
        # code...
        $coupon = Coupon::find($coupon_id);

        $coupon->delete();

        session()->flash('message','!Coupon Eliminado Correctamente¡');
    }
    public function render()
    {
        $coupons = Coupon::all();

        return view('livewire.admin.admin-coupons-component',[
            'coupons' => $coupons
        ])
        ->layout('layouts.base');
    }
}
