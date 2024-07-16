<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:255',
        ]);

        $search = $request->input('search');

        $results = Media::whereAny(
            [
                'title',
                'description',
                'origin_title',
            ],
            'LIKE',
            "%$search%"
        )->get();

        return view('media.search', compact('results', 'search'));
    }
}
