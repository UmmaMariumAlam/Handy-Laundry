<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Laundromat;
use Illuminate\Support\Facades\Auth;


class LaundromatController extends Controller
{
    public function index()
    {
        $laundromatId = Auth::id();
        $pendingOrders = Order::where('laundromat_id', $laundromatId)
            ->where('order_status', 'pending')
            ->get();

        return view('laundromat.dashboard', compact('pendingOrders'));
    }

    public function acceptOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = 'processing';
        $order->save();

        return redirect()->back()->with('status', 'Order accepted.');
    }

    public function rejectOrder(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = 'rejected';
        $order->special_instructions = $request->input('reason');
        $order->save();

        return redirect()->back()->with('status', 'Order rejected.');
    }

    public function processingOrders()
    {
        $processingOrders = Order::where('laundromat_id', Auth::id())
            ->where('order_status', 'processing')
            ->orderBy('last_delivery_date')
            ->get();
        $laundromat = Laundromat::find(Auth::id());
        $laundromatName = $laundromat ? $laundromat->laundromat_name : 'Unknown';
        return view('laundromat.processingOrders', compact('processingOrders','laundromatName'));
    }

    public function markComplete($id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = 'complete';
        $order->save();

        return redirect()->back()->with('status', 'Order marked as completed.');
    }

    public function salesHistory()
    {
        $completedOrders = Order::where('laundromat_id', Auth::id())
            ->where('order_status', 'complete')
            ->get();

        return view('laundromat.salesHistory', compact('completedOrders'));
    }

    public function editProfile()
    {
        $laundromat = Laundromat::findOrFail(Auth::id());
        return view('laundromat.editProfile', compact('laundromat'));
    }

    public function updateProfile(Request $request)
    {
        $laundromat = Laundromat::findOrFail(Auth::id());
        $laundromat->update($request->all());

        return redirect()->route('laundromat.home')->with('status', 'Profile updated.');
    }
}
