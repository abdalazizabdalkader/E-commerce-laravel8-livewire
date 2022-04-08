<?php

namespace App\Http\Livewire;

use Cart;
use Livewire\Component;

class WishListComponent extends Component
{
    public function removeWishList($product_id)
    {

        foreach(Cart::instance('wishList')->content() as $item)
        {
            if($item->id == $product_id)
            {
                Cart::instance('wishList')->remove($item->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return;
            }
        }
    }

    public function moveProductToCart($rowId)
    {
        $item = Cart::instance('wishList')->get($rowId);
        Cart::instance('wishList')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
        $this->emitTo('cart-count-component','refreshComponent');

    }
    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component','refreshComponent');
        
    }

    public function render()
    {
        return view('livewire.wish-list-component')->layout('layouts.base');
    }
}
