<?php

namespace App\Http\Controllers\Call;

use App\Http\Controllers\Controller;
use App\Http\Requests\Call\StoreRequest;
use App\Models\Call;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        $data = $request->validated();
        $call = Call::create($data);
        return $call;
    }
}
