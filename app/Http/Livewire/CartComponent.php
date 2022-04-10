<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use App\Models\Product;
use Livewire\Component;
use Carbon\Carbon;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{

    public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $taxAfterDiscount;
    public $subtotalAfterDiscount;
    public $TotalAfterDiscount;

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


    public function applyCouponCode()
    {
        $coupon = Coupon::where('code',$this->couponCode)->where('expiry_date','>=', Carbon::today())->where('cart_value', '<=', Cart::instance('cart')->subtotal())->first();
    //    dd($coupon);
        if(!$coupon)
        {
            session()->flash('message', 'the coupon code is invalide!!');
            return;
        }
        session()->put('coupon',[
            'code'=> $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value,
        ]);
    }

    public function calcDiscount()
    {
        if(session()->has('coupon'))
        {
            if(session()->get('coupon')['type'] == 'fixed')
            {
                $this->discount = session()->get('coupon')['value'];
            }
            else
            {
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value'])/100;
            }
            // dd($this->discount);
            $this->subtotalAfterDiscount = (Cart::instance('cart')->subtotal() - $this->discount);
            $this->taxAfterDiscount = (Cart::instance('cart')->subtotal() * config('cart.tax'))/100;
            $this->TotalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
        }
    }

    public function removeDiscount()
    {
        session()->forget('coupon');
    }

    public function checkout()
    {
        if(Auth::check())
        {
            return redirect()->route('checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {
        if(!Cart::instance('cart')->count() > 0)
        {
            session()->forget('checkout');
            return;
        }
        if(session()->has('coupon'))
        {
            session()->put('checkout',[
                'discount' =>   $this->discount,
                'subtotal' =>   $this->subtotalAfterDiscount,
                'tax' =>    $this->taxAfterDiscount,
                'total' =>  $this->TotalAfterDiscount,
            ]);
        }
        else
        {
            session()->put('checkout',[
                'discount' =>   0,
                'subtotal' =>   Cart::instance('cart')->subtotal(),
                'tax' =>    Cart::instance('cart')->tax(),
                'total' =>  Cart::instance('cart')->total(),
            ]);
        }
    }

    public function render()
    {
        if(session()->has('coupon'))
        {
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value'])
            {
                session()->forget('coupon');
            }
            else{
                $this->calcDiscount();
            }
        }
        $this->setAmountForCheckout();
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
