<?php
namespace App\Http\Controllers\Auth; 

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    public function showRegisterForm() {
        return view('auth.customer_register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customer',
            'password' => 'required|min:6|confirmed',
        ]);

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('customer.login')->with('success', 'Registered successfully');
    }

    public function showLoginForm() {
        return view('auth.customer_login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $customer = Customer::where('email', $request->email)->first();

        if ($customer && Hash::check($request->password, $customer->password)) {
            session(['customer' => $customer]);
            return redirect()->route('customer.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function dashboard() {
        if (!session()->has('customer')) {
            return redirect()->route('customer.login');
        }
        return view('customer.dashboard');
    }

    public function logout() {
        session()->forget('customer');
        return redirect()->route('customer.login');
    }
}
