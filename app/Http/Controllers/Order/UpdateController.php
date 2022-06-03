<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use App\Models\Order;

class UpdateController extends Controller
{
    public function __invoke(Order $order){

          $order['progress'] = 2;
          $order->update();

        return redirect(route('order.index'));
    }
}
