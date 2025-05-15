<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Laundromat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaundromatLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.laundromat-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('business_email', 'password');
    
        if (Auth::guard('laundromat')->attempt($credentials)) {
            return redirect()->route('laundromat.dashboard');
        }
    
        return back()->withErrors(['business_email' => 'Invalid credentials']);
    }
    
    public function logout()
    {
        Auth::guard('laundromat')->logout();
        return redirect()->route('laundromat.login');
    }
}
