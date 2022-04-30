<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

<<<<<<< HEAD

=======
>>>>>>> 4b55769b9f8144b16b37cb50a637b82e1ac2f3ab
    public function user()
    {
        return $this->belongsTo(User::class);
    }
<<<<<<< HEAD
    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    
=======
>>>>>>> 4b55769b9f8144b16b37cb50a637b82e1ac2f3ab
}
