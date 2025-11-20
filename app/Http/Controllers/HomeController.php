<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::where('featured', true)
            ->orderBy('order')
            ->take(3)
            ->get();

        $featuredPhotos = Photo::where('featured', true)
            ->orderBy('order')
            ->take(6)
            ->get();

        $featuredProducts = Product::where('is_active', true)
            ->latest()
            ->take(3)
            ->get();

        return view('home', compact('featuredProjects', 'featuredPhotos', 'featuredProducts'));
    }
}
