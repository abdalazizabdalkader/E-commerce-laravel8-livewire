<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sale;
use Livewire\Component;

class SaleAdminComponent extends Component
{
    public $sale_date;
    public $status;

    public function mount()
    {   $sale = Sale::find(1);
        $this->sale_date =$sale ->sale_date;
        $this->status = 1;
    }

    public function UpdateSaleDate()
    {
        $sale  = Sale::find(1);
        $sale->sale_date = $this->sale_date;
        $sale->status = $this->status;
        $sale->save();
        session()->flash('message', 'Sale date has been updated successfully!! ');

    }
    public function render()
    {
        return view('livewire.admin.sale-admin-component')->layout('layouts.base');
    }
}
