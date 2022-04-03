<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class HomeSliderAdminComponent extends Component
{
    public function render()
    {
        $homeSliders = HomeSlider::all();
        return view('livewire.admin.home-slider-admin-component',['homeSliders'=>$homeSliders])->layout('layouts.base');
    }

    public function deleteSlider($id)
    {
        $slider = HomeSlider::find($id);
        $slider->delete();
        session()->flash('message','The slide deleted successfully');
    }
}
