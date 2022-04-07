<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class SearchComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $sizePage;

    public $search;
    public $product_cat;
    public $product_cat_id;
    // public $categories;
    public function mount()
    {
        $this->sorting = 'default';
        $this->sizePage = 12;
        $this->fill(request()->only('search', 'product_cat','product_cat_id'));
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message',$product_name.' added in Cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $categories = Category::all();
        if($this->sorting === 'date')
        {
        $products = Product::where('name','like', '%'.$this->search.'%')->where('category_id','like', '%'.$this->product_cat_id.'%')->orderBy('created_at','DESC')->paginate($this->sizePage);

        }elseif ($this->sorting === 'price')
        {
        $products = Product::where('name','like', '%'.$this->search.'%')->where('category_id','like', '%'.$this->product_cat_id.'%')->orderBy('regular_price','ASC')->paginate($this->sizePage);
        }elseif($this->sorting === 'price-desc')
        {
            $products = Product::where('name','like', '%'.$this->search.'%')->where('category_id','like', '%'.$this->product_cat_id.'%')->orderBy('regular_price','DESC')->paginate($this->sizePage);
        }else
        {
            $products = Product::where('name','like', '%'.$this->search.'%')->where('category_id','like', '%'.$this->product_cat_id.'%')->paginate($this->sizePage);
        }
        return view('livewire.search-component',['products'=>$products, 'categories'=>$categories])->layout('layouts.base');
    }
}
