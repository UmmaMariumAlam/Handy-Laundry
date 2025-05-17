<?php


namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_profile_can_be_updated()
    {
        $customer = Customer::factory()->create([
            'name' => 'Old Name',
            'address' => 'Old Address',
            'phone' => '1234567890',
            'password' => bcrypt('oldpassword'),
        ]);

        
            $response = $this
        ->put(route('customer.update', $customer->getKey()), [
            'name' => 'New Name',
            'address' => 'New Address',
            'phone' => '0987654321',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ]);
        dump($response->getSession()->all());

        $response->assertRedirect(route('customer.dashboard'))
            ->assertSessionHas('success', 'Customer updated successfully!');

        $customer = Customer::find($customer->getKey());
        // dump($customer->toArray());
        $customer->refresh();
        // $this->assertEquals('New Name', $customer->name);///////////
        $this->assertEquals('Wrong Name', $customer->name);
        $this->assertEquals('New Address', $customer->address);
        $this->assertEquals('0987654321', $customer->phone);
        $this->assertTrue(Hash::check('newpassword', $customer->password));
    }
}