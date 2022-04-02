<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
class CategoryAdminComponent extends Component
{
    use WithPagination;
    // protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $categories = Category::Paginate(5);

        return view('livewire.admin.category-admin-component',['categories'=>$categories])->layout('layouts.base');
    }
}
