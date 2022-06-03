<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use App\Models\Order;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){


        $data = $request->validated();
        if(isset($data['products'])){
            $products = $data['products'];
            unset($data['products']);
        }

        $order = Order::firstOrCreate($data);

        if(isset($products)){
            foreach ($products as $product)
            $order->products()->attach($product['id'], ['quantity' => $product['quantity']]);
        }

        return $order;
    }
}
