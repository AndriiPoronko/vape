<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminController extends Controller
{
    public function __invoke()
    {
        $count = Order::where('progress', 1)->count();
        return view('main.index', compact('count'));
    }
}
