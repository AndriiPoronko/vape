<?php

namespace App\Http\Controllers;

use App\Http\Filters\ProductFilter;
use App\Http\Requests\Product\FilterRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class TrendController extends Controller
{
    public function __invoke(){

        $trends = Product::where('trend', 1)->with('colors')->get();
        return $trends;
    }
}
