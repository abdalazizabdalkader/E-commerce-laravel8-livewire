<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
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
    public function render()
    {
        $categories = Category::Paginate(5);

        return view('livewire.admin.category-admin-component',['categories'=>$categories])->layout('layouts.base');
    }
}
