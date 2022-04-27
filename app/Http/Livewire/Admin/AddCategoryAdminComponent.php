<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Illuminate\Support\Str;
class AddCategoryAdminComponent extends Component
{
    public $slug;
    public $name;
    public $category_id;
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
        if($this->category_id)
        {
            $subcategory = new Subcategory();
            $subcategory->name = $this->name;
            $subcategory->slug = $this->slug;
            $subcategory->category_id = $this->category_id;
            $subcategory->save();
        }
        else{
            $category = new Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->save();
        }
        session()->flash('message', 'Category has been added successfuly');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.add-category-admin-component',['categories'=>$categories])->layout('layouts.base');
    }
}
