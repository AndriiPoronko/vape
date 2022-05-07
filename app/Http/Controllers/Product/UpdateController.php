<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product){
        $data = $request->validated();
        $data['is_avialable'] = isset($data['is_avialable']) ? '1' : '0';

        $colors = $data['colors'];
        unset($data['colors']);

        $product->update($data);

        $product->colors()->sync($colors);

        return view('product.show', compact('product'));
    }
}
