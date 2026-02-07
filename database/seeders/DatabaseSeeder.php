<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
        ]);

        User::factory(20)->create();

        $this->call([
            CategorySeeder::class,
            SupplierSeeder::class,
            // ProductSeeder::class,
            // ImageSeeder::class,
            // OrderSeeder::class,
            // OrderItemSeeder::class
        ]);
    }
}
