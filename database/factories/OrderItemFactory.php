<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ordersIds = Order::pluck('id')->toArray();
        $productsIds = Product::pluck('id')->toArray();
        return [
            'quantity' => $this->faker->numberBetween(1, 10),
            'unit_price' => $this->faker->randomFloat(2, 10, 1000),
            'order_id' => $this->faker->randomElement($ordersIds),
            'product_id' => $this->faker->randomElement($productsIds),
        ];
    }
}
