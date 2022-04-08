<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AddCouponAdminComponent extends Component
{

    public $code;
    public $type = 'percent';
    public $value;
    public $cart_value;

    public function update($fields)
    {
        $this->validateOnly($fields ,[
            'code' => 'required |unique:coupons',
            'type' => 'required',
            'value' => 'required |numeric',
            'cart_value' => 'required |numeric',
        ]);
    }
    public function addCoupon()
    {
        $this->validate([
            'code' => 'required |unique:coupons',
            'type' => 'required',
            'value' => 'required |numeric',
            'cart_value' => 'required |numeric',
        ]);
        $coupon = new Coupon();
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon ->save();
        session()->flash('message', 'the coupon added successfully!!');
    }

    public function render()
    {
        return view('livewire.admin.add-coupon-admin-component')->layout('layouts.base');
    }
}
