<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Laundromat;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = session('customer');
        if (!$customer) {
            return redirect()->route('customer.login');
    }
        
        // Fetch orders for the logged-in customer
        $orders = \App\Models\Order::where('customer_id', $customer->customer_id)
            ->orderByDesc('created_at')
            ->get();

        return view('orders.index', compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!session('customer')) {
            return redirect()->route('customer.login')->with('error', 'You must be logged in to place an order.');
        }
        $laundromats = Laundromat::all();
        return view('orders.create', compact('laundromats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'laundromat_id' => 'required|exists:laundromats,laundromat_id',
            'service_type' => 'required',
            'cloth_type' => 'required',
            'cloth_qty' => 'required|integer|min:1',
            'pickup_method' => 'required',
            'special_instructions' => 'nullable|string|max:200',
        ]);

        $laundromat = Laundromat::find($validated['laundromat_id']);
        $customer = session('customer');
        if (!$customer) {
            return redirect()->route('customer.login');
        }

        $item_price = $laundromat->price_per_item * $validated['cloth_qty'];

        Order::create([
            'customer_id' => $customer->customer_id,
            'laundromat_id' => $laundromat->laundromat_id,
            'laundromat_name' => $laundromat->laundromat_name,
            'price_per_item' => $laundromat->price_per_item,
            'laundromat_address' => $laundromat->address,
            'order_status' => 'pending',
            'service_type' => $validated['service_type'],
            'cloth_type' => $validated['cloth_type'],
            'cloth_qty' => $validated['cloth_qty'],
            'item_price' => $item_price,
            'pickup_method' => $validated['pickup_method'],
            'special_instructions' => $validated['special_instructions'],
        ]);

    
        return redirect()->route('customer.dashboard')->with('status', 'Order placed successfully!');
    }

        /**
         * Display the specified resource.
         */
    public function show(Order $order)
    {
        //
    // Optionally, check if the logged-in customer owns this order
        $customer = session('customer');
        if (!$customer || $order->customer_id != $customer->customer_id) {
            abort(403, 'Unauthorized');
        }
        return view('orders.show', compact('order'));
    }


    public function getLaundromatDetails($id)
{
    $laundromat = Laundromat::findOrFail($id);
    return response()->json([
        'price_per_item' => $laundromat->price_per_item,
        'address' => $laundromat->address,
    ]);
}
}
