<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(){
        $orders = Order::with('products')->paginate(10);
        foreach ($orders as $order){
            foreach ($order->products as $product){
                $order['total'] += $product->price * $product->pivot->quantity;
            }
        }
        return view('order.index', compact('orders'));
    }
}
