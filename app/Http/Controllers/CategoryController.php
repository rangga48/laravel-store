<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('galleries')->paginate(32);

        return view('pages.category', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::with('galleries')->where('categories_id', $category->id)->paginate(32);

        return view('pages.category', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
