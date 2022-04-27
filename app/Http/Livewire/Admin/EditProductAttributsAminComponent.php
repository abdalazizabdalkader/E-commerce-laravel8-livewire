<?php

namespace App\Http\Livewire\Admin;

use App\Models\Productattribute;
use Livewire\Component;

class EditProductAttributsAminComponent extends Component
{
    public $name;
    public $attribute_id;
    public function mount($attribute_id)
    {
        $pattribute = Productattribute::find($attribute_id);
        $this->attribute_id = $pattribute->id;
        $this->name = $pattribute->name;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=> 'required'
        ]);
    }
    public function updateAttribute()
    {
        $this->validate([
            'name'=>'required'
        ]);
        $pattribute = Productattribute::find($this->attribute_id);
        $pattribute->name = $this->name;
        $pattribute->save();
        session()->flash('message','The attribute updated successfully!!');
    }
    public function render()
    {
        return view('livewire.admin.edit-product-attributs-amin-component')->layout('layouts.base');
    }
}
