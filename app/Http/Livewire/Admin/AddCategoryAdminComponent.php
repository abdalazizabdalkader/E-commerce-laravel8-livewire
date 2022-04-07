<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
class AddCategoryAdminComponent extends Component
{
    public $slug;
    public $name;
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
    }

    public function storeCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message', 'Category has been added successfuly');
    }
    public function render()
    {
        return view('livewire.admin.add-category-admin-component')->layout('layouts.base');
    }
}
