<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class HomeCategoryAdminComponent extends Component
{
    public $selected_categories = [];
    public $num_of_proucts;

    public function mount()
    {
        $category = HomeCategory::find(1);
        $this->selected_categories = explode(',',$category->selected_categories);
        $this->num_of_proucts = $category->num_of_proucts;
    }

    public function updateHomeCat()
    {
        $cat = HomeCategory::find(1);
        $cat->selected_categories = implode(',',$this->selected_categories);
        $cat->num_of_proucts = $this->num_of_proucts;
        $cat->save();
        session()->flash('message','the categories home page updated successfully!!');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.home-category-admin-component',['categories'=>$categories])->layout('layouts.base');
    }
}
