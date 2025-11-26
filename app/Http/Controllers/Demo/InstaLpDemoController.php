<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;

class InstaLpDemoController extends Controller
{
    public function index()
    {
        return view('demo.insta-lp.index');
    }
}
