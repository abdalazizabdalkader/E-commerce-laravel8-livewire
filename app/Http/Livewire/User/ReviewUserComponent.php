<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use Livewire\Component;

class ReviewUserComponent extends Component
{
    public $order_item_id;

    public $rating;
    public $comment;


    public function mount($order_item_id)
    {
        $this->order_item_id = $order_item_id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'rating'=>'required',
            'comment'=>'required'
        ]);
    }
    
    public function addReview()
    {
        $this->validate([
            'rating'=>'required',
            'comment'=>'required'
        ]);
        $review = new Review();
        $review->rating = $this->rating;
        $review->comment = $this->comment;
        $review->order_item_id = $this->order_item_id;
        $review->save();

        $order_item = OrderItem::find($this->order_item_id);
        $order_item->review_status = true;
        $order_item->save();

        session()->flash('reviewMsg','Your review has been added successfully!');
    }
    public function render()
    {   $orderItem = OrderItem::find($this->order_item_id);
        return view('livewire.user.review-user-component',['orderItem'=>$orderItem])->layout('layouts.base');
    }
}
