<?php

namespace Database\Factories;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */


     protected $model = OrderItem::class;

    public function definition()
    {
        return [
    'product_id' => $this->faker->numberBetween(5,49),
    'order_id' => $this->faker->numberBetween(1,14),
    'price' => $this->faker->numberBetween(100,1000),
    'quantity' => $this->faker->numberBetween(1,200),
    'review_status'=> false,
];

    }
}
