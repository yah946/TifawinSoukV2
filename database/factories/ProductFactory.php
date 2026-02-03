<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Supplier;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $categoryIds = Category::pluck('id')->toArray();
        $supplierIds = Supplier::pluck('id')->toArray();
        return [
            'category_id'=>fake()->randomElement($categoryIds),
            'supplier_id'=>fake()->randomElement($supplierIds),
            'name'=>fake()->word(),
            'description'=>fake()->sentence(),
            'stock'=>fake()->numberBetween(5,1000),
            'price'=>fake()->randomFloat(2, 5, 10000),
            'reference'=>fake()->word()
        ];
    }
}
