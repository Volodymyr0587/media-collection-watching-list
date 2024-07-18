<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $user = auth()->user();
        $user_media = $user->media()->where('watched', false)->with('categories');

        // Apply filter by category using scope
        if ($request->has('category_id')) {
            $category_id = $request->category_id;
            $user_media->filterByCategory($category_id);
        }

        // Paginate the results and append the current filter parameter
        $user_media = $user_media->paginate(5)->appends($request->except('page'));

        // Fetch all categories for the dropdown
        $categories = $user->categories()->get();

        return view('media.index', compact('user_media', 'categories'));
    }


    public function getWatched(Request $request)
    {
        $user = auth()->user();
        $user_media = $user->media()->where('watched', true)->with('categories');

        // Apply filter by category using scope
        if ($request->has('category_id')) {
            $category_id = $request->category_id;
            $user_media->filterByCategory($category_id);
        }

        // Paginate the results and append the current filter parameter
        $user_media = $user_media->paginate(5)->appends($request->except('page'));

        // Fetch all categories for the dropdown
        $categories = $user->categories()->get();

        return view('media.watched', compact('user_media', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = auth()->user()->categories()->get();
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
            'origin_title' => 'nullable|string|max:255',
            'year' => 'nullable|numeric|min:1888',
            'country' => 'nullable|string|min:1|max:100',
            'description' => 'nullable|string',
            'season' => 'nullable|integer|min:1',
            'series' => 'nullable|integer|min:1',
            'categories' => 'array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'additional_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:10240', // validate additional images
            'watched' => 'boolean',
        ]);

        // Create new Media instance with validated data
        $media = new Media($data);

        // Handle single image upload if present
        if ($request->hasFile('image')) {
            $media->image = $request->file('image')->store('images', 'public');
        }

        // Associate the media with the user
        $media->user()->associate($user);

        // Save the media instance first to get the media ID
        $media->save();

        // Attach categories if provided
        if ($request->categories) {
            $media->categories()->attach($request->categories);
        }

        // Handle additional images upload
        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $file) {
                $path = $file->store('images/' . $media->id, 'public');
                $media->images()->create(['path' => $path]);
            }
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
        $categories = auth()->user()->categories()->get();
        return view('media.edit', compact('media', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'origin_title' => 'nullable|string|max:255',
            'year' => 'nullable|numeric|min:1888',
            'country' => 'nullable|string|min:1|max:100',
            'description' => 'nullable|string',
            'season' => 'nullable|integer|min:1',
            'series' => 'nullable|integer|min:1',
            'categories' => 'array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'additional_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:10240', // validate additional images
            'watched' => 'sometimes|boolean',
        ]);

        // Handle image upload if present
        if ($request->hasFile('image')) {
            if (isset($media->image)) {
                // Check if the file exists before attempting to delete it
                if (Storage::disk('public')->exists($media->image)) {
                    // Attempt to delete the file
                    Storage::delete('public/' . $media->image);
                }
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Explicitly set 'watched' to false if not present in the request
        $data['watched'] = $request->has('watched');

        $media->update($data);

        // Handle category sync
        if ($request->categories) {
            $media->categories()->sync($request->categories);
        } else {
            $media->categories()->detach();
        }

        // Handle additional images upload
        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $file) {
                $path = $file->store('images/' . $media->id, 'public');
                $media->images()->create(['path' => $path]);
            }
        }

        $route = $media->watched ? 'media.watched' : 'media.index';

        return redirect()->route($route)->with('success', 'Media item updated successfully.');
    }

    public function updateEpisodes(Request $request, Media $media)
    {
        $data = $request->validate([
            'episodes' => 'array',
            'episodes.*' => 'integer|min:1',
        ]);

        $media->watched_episodes = $data['episodes'] ?? [];
        $media->save();

        return redirect()->route('media.show', $media->id)->with('success', 'Episodes updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        $route = $media->watched ? 'media.watched' : 'media.index';

        // Delete associated images
        foreach ($media->images as $image) {
            if (Storage::disk('public')->exists($image->path)) {
                Storage::delete('public/' . $image->path);
            }
        }

        // Delete the directory if it is empty
        $directory = 'images/' . $media->id;
        if (Storage::disk('public')->exists($directory) && Storage::disk('public')->allFiles($directory) == []) {
            Storage::disk('public')->deleteDirectory($directory);
        }

        $media->delete();

        return redirect()->route($route)->with('success', 'Media deleted successfully.');
    }
}
