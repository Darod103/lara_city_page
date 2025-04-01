<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Picture;
use App\Services\PictureServices;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Gallery\PictureStoreRequest;


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
     * @return View
     */
    public function index(): View
    {
        $pictures = $this->pictureServices->getAll();

        return view('gallery.index', compact('pictures'));
    }

    /**
     * Save a new picture.
     *
     * @param PictureStoreRequest $request
     * @return RedirectResponse
     */
    public function store(PictureStoreRequest $request): RedirectResponse
    {
        if (!$this->pictureServices->storePicture($request)) {
            return redirect()->route('gallery.index')->with('error', 'Картинка не загрузилась');
        }

        return redirect()->route('gallery.index')->with('success', 'Картинка успешно добавлена !');
    }

    /**
     * Delete a picture.
     *
     * @param Picture $picture
     * @return RedirectResponse
     */
    public function destroy(Picture $picture): RedirectResponse
    {
        $this->pictureServices->destroyPicture($picture);

        return redirect()->route('gallery.index')->with('success', 'Картинка успешно удалена !');
    }
}
