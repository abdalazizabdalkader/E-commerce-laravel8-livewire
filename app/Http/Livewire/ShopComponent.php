<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class ShopComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $sizePage;
    // public $categories;
    public function mount()
    {
        $this->sorting = 'default';
        $this->sizePage = 12;
        // $this->categories= $categories;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message',$product_name.' added in Cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $categories = Category::all();
        if($this->sorting === 'date')
        {
        $products = Product::orderBy('created_at','DESC')->paginate($this->sizePage);

        }elseif ($this->sorting === 'price')
        {
        $products = Product::orderBy('regular_price','ASC')->paginate($this->sizePage);
        }elseif($this->sorting === 'price-desc')
        {
            $products = Product::orderBy('regular_price','DESC')->paginate($this->sizePage);
        }else
        {
            $products = Product::paginate($this->sizePage);
        }
        return view('livewire.shop-component',['products'=>$products, 'categories'=>$categories])->layout('layouts.base');
    }
}
