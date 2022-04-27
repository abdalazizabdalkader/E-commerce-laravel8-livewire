<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithPagination;
class CategoryAdminComponent extends Component
{
    use WithPagination;
    // protected $paginationTheme = 'bootstrap';
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message','The Category has been deleted successfully');
    }
    public function deleletSubcategory($id)
    {
        $subcategory =Subcategory::find($id);
        $subcategory->delete();
        session()->flash('message','The Category has been deleted successfully');
    }
    public function render()
    {
        $categories = Category::Paginate(15);

        return view('livewire.admin.category-admin-component',['categories'=>$categories])->layout('layouts.base');
    }
}
