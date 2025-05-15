<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User; 
use App\Models\Discount; 
class AdminController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Handle login
    public function login(Request $request)
    {
        // Validate input data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to log the admin in
        $admin = Admin::where('email', $request->email)->first();
        

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Log the admin in
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.dashboard'); // Redirect to the dashboard
        } else {
            return back()->withErrors(['email' => 'Invalid credentials.']);
        }
    }
    public function dashboard()
    {
        // Fetch all users or limit the records as needed
        $users = User::all();  // Or you can use User::paginate(10) for pagination

        // Pass the users data to the view
        return view('admin.dashboard', compact('users'));
    }

    // Logout the admin
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));  // Edit user view
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'User updated successfully');
    }

        public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully.');
    }

    public function coupons()
    {
        $coupons = DB::table('discount')->get();  // Assuming coupons table name is 'coupons'
        return view('admin.coupons', compact('coupons'));
    }
    

    public function storeCoupon(Request $request)
    {
        // Validate input data
        $request->validate([
            'code' => 'required|string|max:50',
            'expiry_date' => 'required|date',
            'discount_rate' => 'required|numeric|min:0.01|max:100',
            'min_order_price' => 'required|numeric|min:0',
        ]);

        // Insert coupon data into the database
        DB::table('discount')->insert([
            'code' => $request->code,
            'expiry_date' => $request->expiry_date,
            'discount_rate' => $request->discount_rate,
            'min_order_price' => $request->min_order_price,
        ]);

        return redirect()->route('admin.coupons')->with('success', 'Coupon added successfully!');
    }




}

