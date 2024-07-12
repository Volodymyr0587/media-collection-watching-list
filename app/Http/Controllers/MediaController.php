<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_media = auth()->user()->media()->with('categories')->get();
        return view('media.index', compact('user_media'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('media.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'categories' => 'array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $media = new Media([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $media->image = $request->file('image')->store('images', 'public');
        }

        $media->user()->associate($user);
        $media->save();

        if ($request->categories) {
            $media->categories()->attach($request->categories);
        }

        return redirect()->route('media.index')->with('success', 'Media item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        return view('media.show', compact('media'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $media)
    {
        $categories = Category::all();
        return view('media.edit', compact('media', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'categories' => 'array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Handle image upload if present
        if ($request->hasFile('image')) {
            if (isset($media->image)) {
                Storage::disk('public')->delete($media->image);
            }
            $media->image = $request->file('image')->store('images', 'public');
        }

        $media->update($data);

        // Handle category sync
        if ($request->categories) {
            $media->categories()->sync($request->categories);
        } else {
            $media->categories()->detach();
        }

        return redirect()->route('media.index')->with('success', 'Media item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        $media->delete();

        return redirect()->route('media.index')->with('success', 'Media deleted successfully.');
    }
}
