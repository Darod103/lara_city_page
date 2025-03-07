<?php

namespace App\Http\Controllers;

use App\Http\Requests\News\NewsStoreRequest;
use App\Models\News;
use App\Services\NewsServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    protected NewsServices $newsServices;

   public function __construct(NewsServices $newsServices)
   {
       $this->newsServices = $newsServices;
   }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allNews = $this->newsServices->getAllNews();
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
    public function store(NewsStoreRequest $request)
    {
       $this->newsServices->storeNews($request);
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
        $this->newsServices->destroyNews($news);
        return redirect()->route('news.index')->with('success', 'Новость успешно удаленна');
    }
}
