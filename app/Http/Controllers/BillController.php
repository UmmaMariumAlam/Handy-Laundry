<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Order;
use Illuminate\Http\Request;

class BillController extends Controller
{
    // Generate a bill for a completed order
    public function generateBill($order_id)
    {
        $order = Order::findOrFail($order_id);

        if ($order->order_status !== 'complete') {
            return redirect()->back()->with('error', 'Bill can only be generated for completed orders.');
        }

        // Check if bill already exists
        $existing = Bill::where('order_id', $order_id)->first();
        if ($existing) {
            return redirect()->route('bills.show', $order_id);
        }

        // Create bill
        $bill = Bill::create([
            'order_id'       => $order->order_id,
            'customer_id'    => $order->customer_id,
            'laundry_id'     => $order->laundromat_id,
            'payment_method' => $order->payment_method ?? 'cash_on_delivery', // or default fallback
            'total_price'    => $order->total_amount,
            'status'         => 'unpaid',
        ]);

        return redirect()->route('bills.show', $bill->order_id);
    }

    // Show a bill
    public function show($order_id)
    {
        $bill = Bill::with(['customer', 'laundromat'])->where('order_id', $order_id)->firstOrFail();

        return view('bills.show', compact('bill'));
    }

    // List all bills (for admin or customer)
    public function index()
    {
        $bills = Bill::with(['customer', 'laundromat'])->orderByDesc('created_at')->get();
        return view('bills.index', compact('bills'));
    }

    // Mark a bill as paid
    public function markAsPaid($id)
    {
        $bill = Bill::findOrFail($id);
        $bill->status = 'paid';
        $bill->save();

        return redirect()->back()->with('status', 'Bill marked as paid.');
    }
}
