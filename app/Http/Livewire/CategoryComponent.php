<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class CategoryComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $sizePage;
    public $category_slug;
    public $subcategory_slug;
    public $min_price_filter;
    public $max_price_filter;
    public function mount($category_slug, $subcategory_slug = null)
    {
        $this->sorting = 'default';
        $this->sizePage = 12;
        $this->category_slug = $category_slug;
        $this->subcategory_slug = $subcategory_slug;
        $this->min_price_filter = 1;
        $this->max_price_filter = 1000;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', $product_name . ' added in Cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $category_id = null;
        $category_name ='';
        $filter ='';
        if($this->subcategory_slug)
        {
            $scategory = Subcategory::where('slug',$this->subcategory_slug)->first();
            $category_id = $scategory->id;
            $category_name = $scategory->name;
            $filter = 'sub';
        }
        else{
            $category = Category::where('slug', $this->category_slug)->first();
            $category_id = $category->id;
            $category_name = $category->name;
            $filter ='';
        }


        if ($this->sorting === 'date') {
            $products = Product::whereBetween('regular_price',[$this->min_price_filter, $this->max_price_filter])->where($filter.'category_id',$category_id)->orderBy('created_at', 'DESC')->paginate($this->sizePage);
        } elseif ($this->sorting === 'price') {
            $products = Product::whereBetween('regular_price',[$this->min_price_filter, $this->max_price_filter])->where($filter.'category_id',$category_id)->orderBy('regular_price', 'ASC')->paginate($this->sizePage);
        } elseif ($this->sorting === 'price-desc') {
            $products = Product::whereBetween('regular_price',[$this->min_price_filter, $this->max_price_filter])->where($filter.'category_id',$category_id)->orderBy('regular_price', 'DESC')->paginate($this->sizePage);
        } else {
            $products = Product::whereBetween('regular_price',[$this->min_price_filter, $this->max_price_filter])->where($filter.'category_id',$category_id)->paginate($this->sizePage);
        }
        $categories = Category::all();
        
        return view('livewire.category-component', [
            'products' => $products,
            'categories' => $categories,
            'category_name' => $category_name,
            'category_id' => $category_id,
        ])->layout('layouts.base');
    }
}
