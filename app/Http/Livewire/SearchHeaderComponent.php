<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class SearchHeaderComponent extends Component
{
    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount()
    {
        $this->product_cat = 'all category' ;
        $this->fill(request()->only('search','product_cat', 'product_cat_id'));
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.search-header-component',['categories'=> $categories]);
    }
}
