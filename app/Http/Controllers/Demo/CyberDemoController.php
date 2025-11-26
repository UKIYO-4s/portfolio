<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;

class CyberDemoController extends Controller
{
    public function index()
    {
        return view('demo.cyber.index');
    }
}
