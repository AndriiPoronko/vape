<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['is_avialable'] = isset($data['is_avialable']) ? '1' : '0';

        $colors = $data['colors'];
        unset($data['colors']);

        $products = Product::firstOrCreate([
            'title' => $data['title'],
        ], $data);

        $products->colors()->attach($colors);

        return redirect()->route('product.index');
    }
}
