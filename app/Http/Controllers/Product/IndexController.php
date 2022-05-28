<?php

namespace App\Http\Controllers\Product;

use App\Http\Filters\ProductFilter;
use App\Http\Requests\Product\FilterRequest;
use App\Models\Category;
use App\Models\Product;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request){
        $data = $request->validated();

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $products = Product::filter($filter)->paginate(6);
        $categories = Category::all();
        return view('product.index', compact(['products', 'categories']));
    }
}
