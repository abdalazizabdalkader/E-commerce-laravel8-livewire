<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty +1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');

    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');

    }
    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');

    }

    public function destroyAll()
    {

        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component','refreshComponent');

    }

    public function moveToSaveLater($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('savelater')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','The '.$item->name.'has been moved to save for later');
    }

    public function moveFromSaveLaterToCart($rowId)
    {
        $item = Cart::instance('savelater')->get($rowId);
        Cart::instance('savelater')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_msg','The '.$item->name.'has been Added to the cart');
    }

    public function removeFromSaveLater($rowId)
    {
        Cart::instance('savelater')->remove($rowId);
        session()->flash('success_msg','The product has been removed from save for later');

    }

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
