<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;

class DeleteController extends BaseController
{
    public function __invoke(Category $category){
        $category->delete();

        return redirect()->route('category.index');
    }
}
