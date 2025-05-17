<?php


namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Customer;
use App\Models\Laundromat;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;
    

    public function test_customer_can_place_order()
    {
        // Create a customer and laundromat
        $customer = Customer::factory()->create();
    
        $laundromat = \App\Models\Laundromat::create([
            'laundromat_name' => 'Test Laundromat',
            'representative_name' => 'John Doe',
            'business_email' => 'laundromat@example.com',
            'password' => bcrypt('password123'), // <-- Add this line!
            'area' => 'Central',
            'operating_hours' => '9am-9pm',
            'phone' => '9876543210',
            'address' => '456 Laundry Ave',
            'price_per_item' => 100,
        ]);

        // Simulate logged-in customer in session
        $this->withSession(['customer' => $customer]);

        // Place an order
        $response = $this->post(route('orders.store'), [
            'laundromat_id' => $laundromat->laundromat_id,
            'service_type' => 'drywash',
            'cloth_type' => 'shirt_top',
            'cloth_qty' => 2,
            'pickup_method' => 'self-pickup',
            'special_instructions' => 'Handle with care',
        ]);

        $response->assertRedirect(route('customer.dashboard'));
        $response->assertSessionHas('status', 'Order placed successfully!');

        // Assert order is in the database
        $this->assertDatabaseHas('orders', [
            'customer_id' => $customer->customer_id,
            'laundromat_id' => $laundromat->laundromat_id,
            'service_type' => 'drywash',
            'cloth_type' => 'shirt_top',
            'cloth_qty' => 2,
            'pickup_method' => 'self-pickup',
            'special_instructions' => 'Handle with care',
        ]);
    }
}