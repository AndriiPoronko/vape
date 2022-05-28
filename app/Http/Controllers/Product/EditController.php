<?php

namespace App\Http\Controllers\Product;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;

class EditController extends BaseController
{
    public function __invoke(Product $product){
        $categories = Category::all();
        $colors = Color::all();
        $colorsIds = [];
        foreach ($product->colors as $color){
            $colorsIds[] = $color->id;
        }
        $tags = Tag::all();
        $tagIds = [];
        foreach ($product->tags as $tag){
            $tagIds[] = $tag->id;
        }
        return view('product.edit', compact(['product', 'categories', 'colors', 'colorsIds', 'tags', 'tagIds']));
    }
}
