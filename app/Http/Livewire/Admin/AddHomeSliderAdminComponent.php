<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;


class AddHomeSliderAdminComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $sub_title;
    public $price;
    public $link;
    public $status;
    public $image;

    public function mount()
    {
        $this->status = 1;
    }

    public function addHomeSlider()
    {
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->sub_title = $this->sub_title;
        $slider->price= $this->price;
        $slider->link= $this->link;
        $slider->status= $this->status;
        $imgName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('sliders',$imgName);
        $slider->image= $imgName;
        $slider->save();
        session()->flash('message','The slide created successfully');

    }
    public function render()
    {
        return view('livewire.admin.add-home-slider-admin-component')->layout('layouts.base');
    }
}
