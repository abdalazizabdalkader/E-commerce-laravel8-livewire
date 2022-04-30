<?php

namespace App\Http\Livewire;

<<<<<<< HEAD
use App\Mail\Ordermail;
=======
>>>>>>> 4b55769b9f8144b16b37cb50a637b82e1ac2f3ab
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
<<<<<<< HEAD
use Illuminate\Support\Facades\Mail;
=======
>>>>>>> 4b55769b9f8144b16b37cb50a637b82e1ac2f3ab

class CheckoutComponent extends Component
{

    public $shipToDifferent;

    public $firstname;
    public $lastname;
    public $mobile;
    public $email;
    public $line1;
    public $line2;
    public $city;
    public $country;
    public $province;
    public $zipcode;

    public $s_firstname;
    public $s_lastname;
    public $s_mobile;
    public $s_email;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_country;
    public $s_province;
    public $s_zipcode;

    public $paymentMod;
<<<<<<< HEAD
    public $thankyou;
=======
    public $thanhyou;
>>>>>>> 4b55769b9f8144b16b37cb50a637b82e1ac2f3ab

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
            'line1' => 'required',
            'city' => 'required',
            'country' => 'required',
            'province' => 'required',
            'zipcode' => 'required',
            'paymentMod' => 'required',
        ]);
        if($this->shipToDifferent)
        {
            $this->validateOnly($fields,[
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_mobile' => 'required|numeric',
                's_email' => 'required|email',
                's_line1' => 'required',
                's_city' => 'required',
                's_country' => 'required',
                's_province' => 'required',
                's_zipcode' => 'required',
            ]);
        }

    }

    public function placeOrder()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
            'line1' => 'required',
            'city' => 'required',
            'country' => 'required',
            'province' => 'required',
            'zipcode' => 'required',
            'paymentMod' => 'required',

        ]);


        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->total = session()->get('checkout')['total'];
        $order->tax = session()->get('checkout')['tax'];
        $order->discount = session()->get('checkout')['discount'];
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->mobile = $this->mobile;
        $order->email = $this->email;
        $order->line1 = $this->line1;
        $order->city = $this->city;
        $order->country = $this->country;
        $order->province = $this->province;
        $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->shipToDifferent ? 1:0;
        $order->save();

        foreach(Cart::instance('cart')->content() as $item )
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
<<<<<<< HEAD
            if($item->options)
            {
                $orderItem->options = serialize($item->options);
            }
=======
>>>>>>> 4b55769b9f8144b16b37cb50a637b82e1ac2f3ab
            $orderItem->save();
        }

        if($this->shipToDifferent)
        {
            $this->validate([
                's_firstname' => 'required',
                's_lastname' => 'required',
                's_mobile' => 'required|numeric',
                's_email' => 'required|email',
                's_line1' => 'required',
                's_city' => 'required',
                's_country' => 'required',
                's_province' => 'required',
                's_zipcode' => 'required',
            ]);

            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstname = $this->s_firstname;
            $shipping->lastname = $this->s_lastname;
            $shipping->mobile = $this->s_mobile;
            $shipping->email = $this->s_email;
            $shipping->line1 = $this->s_line1;
            $shipping->city = $this->s_city;
            $shipping->country = $this->s_country;
            $shipping->province = $this->s_province;
            $shipping->zipcode = $this->s_zipcode;
            $shipping->save();
        }


        if($this->paymentMod == 'cod')
        {
            $transaction = new Transaction();
            $transaction->order_id = $order->id;
            $transaction->user_id = Auth::user()->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }
<<<<<<< HEAD
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');


        $this->sendConfirmationMail($order);
    }

    public function sendConfirmationMail($order)
    {
        Mail::to($order->email)->send(new Ordermail($order));
=======
        $this->thanhyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');

>>>>>>> 4b55769b9f8144b16b37cb50a637b82e1ac2f3ab
    }


    public function verifayForCheckout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
<<<<<<< HEAD
        else if($this->thankyou)
=======
        else if($this->thanhyou)
>>>>>>> 4b55769b9f8144b16b37cb50a637b82e1ac2f3ab
        {
            return redirect()->route('thankyou');
        }
        else if(!session()->get('checkout'))
        {
            return redirect()->route('product.cart');
        }

    }


    public function render()
    {
        $this->verifayForCheckout();
        return view('livewire.chechout-component')->layout('layouts.base');
    }
}
