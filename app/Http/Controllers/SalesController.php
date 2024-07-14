<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class SalesController extends Controller
{
    public function salesReport(Request $request)
    {
        // Default to last 30 days if no date range selected
        $startDate = $request->input('start_date', Carbon::now()->subDays(30)->startOfDay());
        $endDate = $request->input('end_date', Carbon::now()->endOfDay());

        // Query to fetch orders within the date range
        $orders = Order::whereBetween('order_date', [$startDate, $endDate])->with('user', 'orderItems')->get();

        // Calculate total price for each order
        $orders = $orders->map(function ($order) {
            $order->total_price = $order->orderItems->sum(function ($item) {
                return $item->quantity * $item->item_price;
            });
            return $order;
        });

        // Pass data to the view
        return view('admin.layout.safes.report', compact('orders', 'startDate', 'endDate'));
    }
}
