<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductAttribute;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use Illuminate\Support\Facades\Auth;

class ShopComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $sizePage;
    public $min_price_filter;
    public $max_price_filter;

    public function mount()
    {   //sorting product
        $this->sorting = 'default';
        $this->sizePage = 12;

        //price filter
        $this->min_price_filter = 1;
        $this->max_price_filter = 1000;
    }

    public function store($product_id, $product_name, $product_price)
    {

        Cart::instance('cart')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message',$product_name.' added in Cart');
        return redirect()->route('product.cart');
    }
    public function addWishList($product_id, $product_name, $product_price)
    {
        Cart::instance('wishList')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
    }

    public function removeWishList($product_id)
    {

        // dd(Cart::instance('wishList')->content());
        foreach(Cart::instance('wishList')->content() as $item)
        {
            if($item->id == $product_id)
            {
                // dd($item->id);
                Cart::instance('wishList')->remove($item->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return;
            }
        }
    }

    public function render()
    {
        $categories = Category::all();
        if($this->sorting === 'date')
        {
        $products = Product::whereBetween('regular_price',[$this->min_price_filter, $this->max_price_filter])->orderBy('created_at','DESC')->paginate($this->sizePage);

        }elseif ($this->sorting === 'price')
        {
        $products = Product::whereBetween('regular_price',[$this->min_price_filter, $this->max_price_filter])->orderBy('regular_price','ASC')->paginate($this->sizePage);
        }elseif($this->sorting === 'price-desc')
        {
            $products = Product::whereBetween('regular_price',[$this->min_price_filter, $this->max_price_filter])->orderBy('regular_price','DESC')->paginate($this->sizePage);
        }else
        {
            $products = Product::whereBetween('regular_price',[$this->min_price_filter, $this->max_price_filter])->paginate($this->sizePage);
        }

        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishList')->store(Auth::user()->email);
        }
        return view('livewire.shop-component',[
                    'products'=>$products,
                     'categories'=>$categories,
                     ])->layout('layouts.base');
    }
}
