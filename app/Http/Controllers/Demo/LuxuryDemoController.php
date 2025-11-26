<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;

class LuxuryDemoController extends Controller
{
    public function index()
    {
        return view('demo.luxury.index');
    }
}
