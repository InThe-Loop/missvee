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
        $women = Product::latest()->where('category_id', '=', 10)->paginate(8);
        $men = Product::latest()->where('category_id', '=', 11)->paginate(8);
        $hair = Product::latest()->where('category_id', '=', 12)->paginate(8);
        $hotProducts = Product::inRandomOrder()->where('featured', '=', 1)->take(4)->get();
        $hires = Hire::paginate(8);

        if ($request->ajax()) {
            return view('partials.paginator')->with([
                'men'=> $men,
                'hair'=> $hair,
                'women'=> $women,
                'hires' => $hires,
            ]);
        }

        return view('welcome')->with([
            'men' => $men ?? null,
            'hair' => $hair ?? null,
            'women'=> $women ?? null,
            'hires' => $hires ?? null,
            'hotProducts' => $hotProducts,
            'categories' => $categories,
            'colors' => $colors,
            'tags' => $tags,
        ]);
    }
}
