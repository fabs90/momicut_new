<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //

    public function showSpecificMenu(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $category->id)->get();

        return view('menu.menuContent', compact('category','products'));
    }
}