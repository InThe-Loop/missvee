<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hire;

class HireController extends Controller
{
    public function index() {
        $pagination = 10;
        $hires = Hire::all();
        $categoryName = 'all';
        $hires = $hires->random()->paginate($pagination);
        
        return view('hire')->with([
            'products' => $hires,
            'categoryName' => $categoryName ?? null,
        ]);
    }
}
