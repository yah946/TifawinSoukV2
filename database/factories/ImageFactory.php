<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productIds = Product::pluck('id')->toArray();

        return [
            'product_id'=>fake()->randomElement($productIds),
            'path'=> sprintf('products/img%s.jpg', fake()->numberBetween(1, 20)),
            'cover'=> fake()->boolean(),
        ];
    }
}
