<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */protected $model = Order::class;
    public function definition()
    {
        return [
                'user_id'=> $this->faker->numberBetween(1,2),
                'subtotal'=> $this->faker->numberBetween(100,1000),
                'total'=> $this->faker->numberBetween(100,1000),
                'tax'=> $this->faker->numberBetween(1,20),
                'discount'=> $this->faker->numberBetween(1,80),
                'firstname'=> $this->faker->text(5),
                'lastname'=> $this->faker->text(10),
                'mobile'=>'0'. $this->faker->numberBetween(900000000,9999999999),
                'email'=> $this->faker->text(10).'@gmail.com',
                'line1'=> $this->faker->text(200),
                'line2'=> $this->faker->text(200),
                'city'=> $this->faker->text(6),
                'country'=> $this->faker->text(6),
                'province'=> $this->faker->text(6),
                'zipcode'=> $this->faker->numberBetween(111,9999),
                'status'=> 'ordered',
                'is_shipping_different'=>false,
            ];
    }
}
