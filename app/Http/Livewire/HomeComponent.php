<?php

namespace App\Http\Livewire;

use App\Models\HomeSlider;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $homeSliders = HomeSlider::where('status',1)->get();
        return view('livewire.home-component',['homeSliders'=>$homeSliders])->layout('layouts.base');
    }
}
