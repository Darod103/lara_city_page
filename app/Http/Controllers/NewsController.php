<?php

namespace App\Http\Controllers;


use App\Models\News;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\NewsServices;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\News\NewsStoreRequest;


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
     * return RedirectResponse
     */
    public function store(NewsStoreRequest $request): RedirectResponse
    {
        if (!$this->newsServices->storeNews($request)) {
            return redirect()->route('news.index')->with('error', 'Ой что-то пошло не так новость не загрузилась');
        }

        return redirect()->route('news.index')->with('success', 'Новость успешно добавлена');
    }

    /**
     * Display the specified resource.
     * @param News $news
     * @return View
     */
    public function show(News $news): View
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
     * @param News $news
     * @return RedirectResponse
     */
    public function destroy(News $news): RedirectResponse
    {
        $this->newsServices->destroyNews($news);

        return redirect()->route('news.index')->with('success', 'Новость успешно удаленна');
    }
}
