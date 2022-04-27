<?php

namespace App\Http\Livewire\Admin;

use App\Models\Productattribute;
use Livewire\Component;

class AddProductAttributsAminComponent extends Component
{
    public $name;
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=> 'required'
        ]);
    }
    public function addattribute()
    {
        $this->validate([
            'name'=> 'required'
        ]);

        $pattribute = new Productattribute();
        $pattribute->name = $this->name;
        $pattribute->save();
        session()->flash('message','The attribute added successfully!!');
    }
    public function render()
    {

        return view('livewire.admin.add-product-attributs-amin-component')->layout('layouts.base');
    }
}
