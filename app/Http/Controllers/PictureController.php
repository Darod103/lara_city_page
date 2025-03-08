<?php

namespace App\Http\Controllers;

use App\Http\Requests\Gallery\PictureRequest;
use App\Models\Picture;
use App\Services\PictureServices;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    public PictureServices $pictureServices;

    public function __construct(PictureServices $pictureServices)
    {
        $this->pictureServices = $pictureServices;
    }

    public function index()
    {
        $pictures = $this->pictureServices->getAll();
        return view('gallery.index', compact('pictures'));
    }

    public function store(PictureRequest $request)
    {
        $this->pictureServices->storePicture($request);
        return redirect()->route('gallery.index')->with('success', 'Картинка успешно добавлена !');
    }

    public function destroy(Picture $picture)
    {
        $this->pictureServices->destroyPicture($picture);
        return redirect()->route('gallery.index')->with('success', 'Картинка успешно удалена !');
    }
}
