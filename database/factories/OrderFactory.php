<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Laundromat;
use Illuminate\Database\Eloquent\Factories\Factory;


class OrderFactory extends Factory
{
       public function definition(): array
    {
        return [
            'customer_id' => Customer::inRandomOrder()->first()?->customer_id ?? Customer::factory(),
            'laundromat_id' => Laundromat::inRandomOrder()->first()?->laundromat_id ?? Laundromat::factory(),
            'laundromat_name' => $this->faker->company(),
            'order_status' => 'pending', 
            'last_delivery_date' => now()->addDays(3),
            'service_type' => 'wash_fold',
            'cloth_type' => 'shirt_top', 
            'special_instructions' => 'No special instructions',
            'cloth_qty' => 1, 
            'item_price' => 10.00,
            'pickup_method' => 'self-pickup',
        ];
    }
}
