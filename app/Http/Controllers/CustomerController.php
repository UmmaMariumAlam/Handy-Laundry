<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;


class CustomerController extends Controller
{
    
    public function profile() {
    $customer = session('customer'); 
    if (!$customer) {
        return redirect()->route('customer.login');
    }
    return view('customer.profile', ['customer' => $customer]);
    }

    public function store(Request $request){
        
        $data =  $request->validate([
        'name' => 'required|string|max:50',
        'email' => 'required|email|unique:customers,email',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'password' => 'required|string|min:8|confirmed',
        ]);
        $newCustomer = Customer::create($data);
        
        $data['password'] = Hash::make($data['password']);

        #we want to return after login to index page

        return redirect()->route('customer.index')->with('success', 'Customer created successfully!');

    }
    public function edit(Customer $customer){
        return view('customer.edit',['customer' => $customer]);
    }
    
    
    public function update(Customer $customer, Request $request)
    {
        
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $customer->update($data);

        return redirect()->route('customer.dashboard')->with('success', 'Customer updated successfully!');
    }
    
}
