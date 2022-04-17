<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrdersAdminComponent extends Component
{
    public function updateOrderStatus($order_id, $status)
    {
        $order = Order::find($order_id);
        $order->status = $status;
        if($status == 'delivered')
        {
            $order->Delivered_date = DB::raw('CURRENT_DATE');
        }
        else if($status == 'canseled')
        {
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('message','Order status has updated successfully!');
    }

    public function render()
    {
        $oreders = Order::orderBy('created_at','DESC')->paginate(12);
        return view('livewire.admin.orders-admin-component',['orders'=>$oreders])->layout('layouts.base');
    }
}
