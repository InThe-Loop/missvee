<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Tag;

class WelcomePageController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->get();
        $tags = Tag::get();
        $categories = Category::get();
        $colors = Product::select('color')->distinct()->get();
        $hotProducts = Product::inRandomOrder()->where('featured', '=', 1)->take(4)->get();
        return view('welcome')->with([
            'products'=> $products,
            'hotProducts' => $hotProducts,
            'tags' => $tags,
            'categories' => $categories,
            'colors' => $colors,
        ]);
    }
}
