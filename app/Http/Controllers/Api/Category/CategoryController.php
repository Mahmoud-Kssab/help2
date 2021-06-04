<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function parentCategories()
    {

        $cats = Category::where('parent', null)->get();
        return responseJeson(1, 'parents categories', $cats );
    }



    public function subCategories($id)
    {

        $cats = Category::where('parent', $id)->get();
        return responseJeson(1, 'sub categories', $cats );
    }

}
