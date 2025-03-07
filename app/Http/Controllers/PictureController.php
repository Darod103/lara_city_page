<?php

namespace App\Http\Controllers;

use App\Http\Requests\Gallery\PictureRequest;
use App\Models\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function index()
    {
        $pictures = Picture::withCount('votes')->orderByDesc('votes_count')->get();
        return view('gallery.index', compact('pictures'));
    }

    public function store(PictureRequest $request)
    {
        $path = $request->file('picture')->store('pictures','public');

        Picture::create([
                'user_id' => auth()->id(),
                'url' => $path
            ]
        );

        return redirect()->route('gallery.index')->with('success', 'Картинка успешно добавлена !');
    }
}
