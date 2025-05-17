<?php

namespace Database\Factories;

use App\Models\Laundromat;
use Illuminate\Database\Eloquent\Factories\Factory;

class LaundromatFactory extends Factory
{
    protected $model = Laundromat::class;

    public function definition()
    {
        return [
            'laundromat_name'      => $this->faker->unique()->company(),
        'representative_name'  => $this->faker->name(),
        'business_email'       => $this->faker->unique()->companyEmail(),
        'password'             => bcrypt('password123'),
        'area'                 => $this->faker->city(),
        'operating_hours'      => '9:00 AM - 8:00 PM',
        'phone'                => $this->faker->phoneNumber(),
        'address'              => $this->faker->address(),
        'price_per_item'       => 10.00,
        'avg_ratings'          => 4.5,
        ];
    }
}
