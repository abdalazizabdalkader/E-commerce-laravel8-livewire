<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class OrdersAdminComponent extends Component
{
    public function render()
    {
        $oreders = Order::orderBy('created_at','DESC')->paginate(12);
        return view('livewire.admin.orders-admin-component',['orders'=>$oreders])->layout('layouts.base');
    }
}
