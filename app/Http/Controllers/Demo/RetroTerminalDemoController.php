<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;

class RetroTerminalDemoController extends Controller
{
    /**
     * Retro Terminal Demo - Index
     */
    public function index()
    {
        return view('demo.retro-terminal.index');
    }
}
