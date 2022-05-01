<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class CouponAdminComponent extends Component
{
    public function deleteCoupon($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        session()->flash('message', 'the coupon removed successfully!!');
    }
    public function render()
    {
        $coupons = coupon::all();
        return view('livewire.admin.coupon-admin-component', ['coupons' => $coupons])->layout('layouts.base');
    }
}
