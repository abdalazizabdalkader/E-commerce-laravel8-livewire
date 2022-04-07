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
    public function render()
    {
        return view('livewire.wish-list-component')->layout('layouts.base');
    }
}
