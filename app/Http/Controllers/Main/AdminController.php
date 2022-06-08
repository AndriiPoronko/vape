<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function __invoke()
    {
        $orders = Order::all()->count();
        $sales = Order::where('progress', 2)->with('products')->get();
        $members = User::all()->count();
        $products = Product::all()->count();
        $messages = Message::all()->count();
        $categories = Category::all()->count();
        $soldProducts = [];
        foreach ($sales as $sale){
            foreach ($sale->products as $product){
                $soldProducts[] = $product;
            }
        }
        return view('main.index', compact(['orders', 'sales', 'members', 'products', 'messages', 'categories', 'soldProducts']));
    }
}
