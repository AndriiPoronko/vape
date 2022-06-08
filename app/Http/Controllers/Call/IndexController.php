<?php

namespace App\Http\Controllers\Call;

use App\Http\Controllers\Controller;
use App\Models\Call;
use App\Models\Order;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(){
        $calls = Call::orderBy('created_at', 'desc')->get();
        return view('call.index', compact('calls'));
    }
}
