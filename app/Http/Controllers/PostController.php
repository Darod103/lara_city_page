<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use function Laravel\Prompts\text;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latestPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        return view('posts.index', ['latestPosts' => $latestPosts]);
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
    public function store(StorePostRequest $request)
    {

        $validated = $request->validated();
        $imagePath = $request->file('image')
            ? $request->file('image')->store('images', 'public')
            : null;

         Post::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'text' => $validated['text'],
            'image_url' => $imagePath,
        ]);

        return redirect()->route('home')->with('success', 'Пост создан.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
