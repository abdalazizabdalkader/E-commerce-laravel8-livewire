<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditHomeSliderAdminComponent extends Component
{

    use WithFileUploads;
    public $title;
    public $sub_title;
    public $price;
    public $link;
    public $status;
    public $image;
    public $new_image;
    public $slider_id;

    public function mount($slide_id)
    {
        $slider = HomeSlider::find($slide_id);
        $this->title = $slider->title;
        $this->sub_title = $slider->sub_title;
        $this->price = $slider->price;
        $this->link = $slider->link;
        $this->status = $slider->status;
        $this->image = $slider->image;
        $this->slider_id = $slide_id;
    }

    public function updateSlider()  
    {
        $slider = HomeSlider::find($this->slider_id);
         $slider->title =  $this->title;
         $slider->sub_title =  $this->sub_title;
         $slider->price =  $this->price;
         $slider->link =  $this->link;
         $slider->status =  $this->status;
         if($this->new_image)
         {
            $imgName = Carbon::now()->timestamp.'.'.$this->new_image->extension();
            $this->new_image->storeAs('sliders',$imgName);
            $slider->image =  $imgName;
         }
         $slider->id = $this->slider_id;
         $slider->save();
        session()->flash('message','The slide updated successfully');

    }

    public function render()
    {
        return view('livewire.admin.edit-home-slider-admin-component')->layout('layouts.base');
    }
}
