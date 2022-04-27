<?php

namespace App\Http\Livewire\Admin;

use App\Models\Productattribute;
use Livewire\Component;

class ProductAttributsAminComponent extends Component
{
    public function deleteAttribute($id)
    {
        $attribute = Productattribute::find($id);
        $attribute->delete();
        session()->flash('message','The attribute deleted successfully!!');
    }
    public function render()
    {
        $pattributes = Productattribute::all();
        return view('livewire.admin.product-attributs-amin-component',['pattributes'=>$pattributes])->layout('layouts.base');
    }
}
