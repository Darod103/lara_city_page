<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allNews = News::all();
        return view('news.index', compact('allNews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'text' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')
            ? $request->file('image')->store('images', 'public')
            : null;

        News::create([
            'user_id' => auth()->id(),
            'title' => $validatedData['title'],
            'text' => $validatedData['text'],
            'image_url' => $imagePath,
        ]);
        return redirect()->route('news.index')->with('success', 'Новость успешно добавлена');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return (view('news.show', compact('news')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        if ($news->img_url) {
            Storage::delete($news->img_url);
        }
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Новость успешно удаленна');
    }
}
