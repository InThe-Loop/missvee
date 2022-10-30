<?php

namespace App\Http\Controllers;

class PoliciesController extends Controller
{
    public function index($page)
    {
        return view('policies', ['page' => $page]);
    }
}
