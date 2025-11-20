<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::orderBy('order')->orderBy('created_at', 'desc')->get();
        return view('admin.photos.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.photos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|max:5120',
            'category' => 'nullable|string|max:100',
            'featured' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('photos', 'public');
        }

        $validated['featured'] = $request->has('featured');
        $validated['order'] = $validated['order'] ?? 0;

        Photo::create($validated);

        return redirect()->route('admin.photos.index')->with('success', 'Photo created successfully!');
    }

    public function edit(Photo $photo)
    {
        return view('admin.photos.edit', compact('photo'));
    }

    public function update(Request $request, Photo $photo)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:5120',
            'category' => 'nullable|string|max:100',
            'featured' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($photo->image_path) {
                Storage::disk('public')->delete($photo->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('photos', 'public');
        }

        $validated['featured'] = $request->has('featured');
        $validated['order'] = $validated['order'] ?? $photo->order;

        $photo->update($validated);

        return redirect()->route('admin.photos.index')->with('success', 'Photo updated successfully!');
    }

    public function destroy(Photo $photo)
    {
        if ($photo->image_path) {
            Storage::disk('public')->delete($photo->image_path);
        }

        $photo->delete();

        return redirect()->route('admin.photos.index')->with('success', 'Photo deleted successfully!');
    }

    public function reorder(Request $request, Photo $photo)
    {
        $request->validate(['order' => 'required|integer']);
        $photo->update(['order' => $request->order]);

        return response()->json(['success' => true]);
    }
}
