<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order_list()
    {
        $orders = Order::with('user','orderItems')->get();

        return view('admin.layout.order.order', compact('orders'));
    }
    public function confirm_order($id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = 'confirm';
        $order->save();

        return redirect()->route('admin.orders')->with('success', 'Order confirmed successfully');
    }
}
