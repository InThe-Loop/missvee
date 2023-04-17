<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Category;
use App\Product;
use App\Hire;
use App\Tag;

class WelcomePageController extends Controller
{
    public function index(Request $request): View
    {
        $tags = Tag::get();
        $categories = Category::get();
        $colors = Product::select('color')->distinct()->get();
        $women = Product::latest()->where('category_id', '=', 10)->paginate(3);
        $men = Product::latest()->where('category_id', '=', 11)->paginate(3);
        $hair = Product::latest()->where('category_id', '=', 12)->paginate(3);
        $hotProducts = Product::inRandomOrder()->where('featured', '=', 1)->take(4)->get();
        $hires = Hire::paginate(3);

        if ($request->ajax()) {
            return view('partials.paginator')->with([
                'women'=> $women,
                'men'=> $men,
                'hair'=> $hair,
                'hires' => $hires,
            ]);
        }

        return view('welcome')->with([
            'women'=> $women,
            'men' => $men,
            'hair' => $hair,
            'hotProducts' => $hotProducts,
            'tags' => $tags,
            'categories' => $categories,
            'colors' => $colors,
            'hires' => $hires,
        ]);
    }
}
