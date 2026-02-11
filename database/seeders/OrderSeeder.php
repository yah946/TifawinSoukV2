<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::factory(30)
            ->create()
            ->each(function (Order $order) {
                // Get random products for THIS order
                $products = Product::inRandomOrder()
                    ->limit(random_int(2, 5)) // each order has 2–5 products
                    ->get();

                $attachData = [];

                foreach ($products as $product) {
                    $attachData[$product->id] = [
                        'quantity'   => fake()->numberBetween(1, 10),
                        'unit_price' => fake()->randomFloat(2, 10, 1000),
                    ];
                }

                $order->products()->syncWithoutDetaching($attachData);
            });

    }
}
