<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create customers
        $customer = Customer::create([
            'name' => 'Test Customer',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'phone' => '1234567890',
            'address' => '123 Test Street',
        ]);

        // Create laundromat
    
        $laundromat = \App\Models\Laundromat::create([
            'laundromat_name' => 'Test Laundromat',
            'representative_name' => 'John Doe',
            'business_email' => 'laundromat@example.com',
            'password' => bcrypt('password123'),
            'area' => 'Central',
            'operating_hours' => '9am-9pm',
            'phone' => '9876543210',
            'address' => '456 Laundry Ave',
            'price_per_item' => 100,
            // 'avg_ratings' => 0.00, // optional, has default
        ]);

        // Create order
        Order::create([
            'customer_id' => $customer->customer_id,
            'laundromat_id' => $laundromat->laundromat_id,
            'laundromat_name' => $laundromat->laundromat_name, // <-- Add this line
            'service_type' => 'drywash',
            'cloth_type' => 'shirt_top',
            'cloth_qty' => 2,
            'item_price' => 100, 
            'pickup_method' => 'self-pickup',
            'special_instructions' => 'Handle with care',
        ]);
    }
    }
}
