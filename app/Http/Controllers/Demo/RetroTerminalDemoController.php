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

    /**
     * Retro Terminal Demo - About
     */
    public function about()
    {
        return view('demo.retro-terminal.about');
    }

    /**
     * Retro Terminal Demo - Service
     */
    public function service()
    {
        return view('demo.retro-terminal.service');
    }

    /**
     * Retro Terminal Demo - Contact
     */
    public function contact()
    {
        return view('demo.retro-terminal.contact');
    }
}
