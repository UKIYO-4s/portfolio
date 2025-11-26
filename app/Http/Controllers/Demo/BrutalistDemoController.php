<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;

class BrutalistDemoController extends Controller
{
    public function index()
    {
        return view('demo.brutalist.index');
    }
}
