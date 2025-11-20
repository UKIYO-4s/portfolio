<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index(Request $request)
    {
        $query = Photo::orderBy('order')->orderBy('created_at', 'desc');

        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        $photos = $query->get();
        $categories = Photo::distinct()->pluck('category')->filter();

        return view('photos.index', compact('photos', 'categories'));
    }
}
