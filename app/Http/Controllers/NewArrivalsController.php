<?php

namespace App\Http\Controllers;

use App\Http\Filters\ProductFilter;
use App\Http\Requests\Product\FilterRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class NewArrivalsController extends Controller
{
    public function __invoke(){

        $newProducts = Product::orderBy('id', 'desc')->with('colors')->take(7)->get();
        return $newProducts;
    }
}
