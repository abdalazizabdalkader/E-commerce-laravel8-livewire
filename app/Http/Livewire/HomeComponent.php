<?php

namespace App\Http\Livewire;

use App\Models\HomeSlider;
use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $homeSliders = HomeSlider::where('status',1)->get();
        $lproducts = Product::orderBy('created_at','DESC')->get()->take(10);
        return view('livewire.home-component',[
            'homeSliders'=>$homeSliders,
            'lproducts' => $lproducts,
        ])->layout('layouts.base');
    }
}
