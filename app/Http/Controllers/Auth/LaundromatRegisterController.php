<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Laundromat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LaundromatRegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.laundromat-register');
    }

    public function register(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'laundromat_name' => 'required|string|max:255',
            'representative_name' => 'required|string|max:255',
            'business_email' => 'required|email|unique:laundromat',
            'password' => 'required|string|min:6|confirmed',
            'area' => 'nullable|string|max:255', 
            'operating_hours' => 'nullable|string|max:255',
            'price_per_item' => 'nullable|numeric',  
            'avg_ratings' => 'nullable|numeric',  
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        // Create the laundromat record in the database
        Laundromat::create([
            'laundromat_name' => $request->laundromat_name,
            'representative_name' => $request->representative_name,
            'business_email' => $request->business_email,
            'password' => Hash::make($request->password),
            'area' => $request->area, 
            'operating_hours' => $request->operating_hours,
            'price_per_item' => $request->price_per_item, 
            'avg_ratings' => $request->avg_ratings,  
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('laundromat.login')->with('success', 'Registration successful');
    }
}
