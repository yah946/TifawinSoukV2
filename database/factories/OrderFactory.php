<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usersIds = User::where('email', '!=', 'admin@gmail.com')->pluck('id')->toArray();

        return [
            'tracking_number' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'total' => $this->faker->randomFloat(2, 10, 1000),
            'is_draft' => $this->faker->boolean,
            'status' => $this->faker->randomElement(['pending', 'shipped', 'delivered', 'cancelled']),
            'payment_method' => $this->faker->randomElement(['cash', 'paypal']),
            'user_id' => $this->faker->randomElement($usersIds),
        ];
    }
}
