<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Support\Facades\Redis;

use function PHPUnit\Framework\returnSelf;
=======
>>>>>>> 4b55769b9f8144b16b37cb50a637b82e1ac2f3ab

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
<<<<<<< HEAD

=======
>>>>>>> 4b55769b9f8144b16b37cb50a637b82e1ac2f3ab
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
<<<<<<< HEAD
    
    public function review()
    {
        return $this->hasOne(Review::class,'order_item_id');
    }

=======
>>>>>>> 4b55769b9f8144b16b37cb50a637b82e1ac2f3ab
}
