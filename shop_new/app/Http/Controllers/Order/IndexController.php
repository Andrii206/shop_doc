<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $orders = Order::all();
        foreach($orders as $order){
            $order->products = json_decode($order->products);
        }
        // dd($orders);
        return view('admin.order.index', compact('orders'));
    }
} 
