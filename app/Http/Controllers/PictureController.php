<?php

namespace App\Http\Controllers;

use App\Http\Requests\Gallery\PictureStoreRequest;
use App\Models\Picture;
use App\Services\PictureServices;


class PictureController extends Controller
{
    public PictureServices $pictureServices;

    public function __construct(PictureServices $pictureServices)
    {
        $this->pictureServices = $pictureServices;
    }

    /**
     * Show all pictures.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pictures = $this->pictureServices->getAll();
        return view('gallery.index', compact('pictures'));
    }

    /**
     * Save a new picture.
     *
     * @param PictureStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PictureStoreRequest $request)
    {
        if (!$this->pictureServices->storePicture($request)) {
            return redirect()->route('gallery.index')->with('error', 'Картинка не загрузилась');
        };
        return redirect()->route('gallery.index')->with('success', 'Картинка успешно добавлена !');
    }

    /**
     * Delete a picture.
     *
     * @param Picture $picture
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Picture $picture)
    {
        $this->pictureServices->destroyPicture($picture);
        return redirect()->route('gallery.index')->with('success', 'Картинка успешно удалена !');
    }
}
