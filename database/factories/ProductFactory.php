<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
// use Models
class ProductFactory extends Factory
{

    protected $model = Product::class;
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb=2,$ad_text=true);
        $slug = Str::slug($product_name);
        return [
            'name'=> $product_name,
            'slug'=> $slug,
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'regular_price'=> $this->faker->numberBetween(10,1000),
            'SKU' => 'DIGI'.$this->faker->unique()->numberBetween(100,500),
            'stock_status'=> 'instock',
            'quantity'=> $this->faker->numberBetween(100,200),
            'image'=> 'digital_'.$this->faker->unique()->numberBetween(1,22).'.jpg',
            'category_id'=> $this->faker->numberBetween(1,5)
        ];
    }
}
