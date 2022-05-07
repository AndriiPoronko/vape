<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __invoke(){
        $products = Product::with('colors')->get();
        return $products;
    }
}
