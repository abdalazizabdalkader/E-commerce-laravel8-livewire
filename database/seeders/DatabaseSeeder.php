<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\Category::factory(10)->create();
        // \App\Models\Product::factory(50)->create();

        // \App\Models\Order::factory(10)->create();
        \App\Models\OrderItem::factory(50)->create();
    }
}


// order item
// return [
//     'product_id' => $this->faker->numberBetween(5,59),
//     'order_id' => $this->faker->numberBetween(1,20),
//     'price' => $this->faker->numberBetween(100,1000),
//     'quantity' => $this->faker->numberBetween(1,200),
//     'review_status'=> false,
// ];


//order
// return [
//     'user_id'=> $this->faker->numberBetween(1,2),
//     'subtotal'=> $this->faker->numberBetween(100,1000),
//     'total'=> $this->faker->numberBetween(100,1000),
//     'tax'=> $this->faker->numberBetween(1,20),
//     'discount'=> $this->faker->numberBetween(1,80),
//     'firstname'=> $this->faker->text(5),
//     'lastname'=> $this->faker->text(10),
//     'mobile'=>'0'. $this->faker->numberBetween(900000000,9999999999),
//     'email'=> $this->faker->text(10).'@gmail.com',
//     'line1'=> $this->faker->text(200),
//     'line2'=> $this->faker->text(200),
//     'city'=> $this->faker->text(6),
//     'country'=> $this->faker->text(6),
//     'province'=> $this->faker->text(6),
//     'zipcode'=> $this->faker->numberBetween(111,9999),
//     'status'=> 'ordered',
//     'is_shipping_different'=>false,
// ];
