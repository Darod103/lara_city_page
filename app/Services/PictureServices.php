<?php

namespace App\Services;

use App\Http\Requests\Gallery\PictureRequest;
use App\Models\Picture;
use Illuminate\Support\Facades\Storage;

class PictureServices
{
    public function getAll()
    {
        return Picture::withCount('votes')->orderByDesc('votes_count')->get();
    }

    public function storePicture(PictureRequest $request)
    {
        $path = $request->file('picture')->store('pictures', 'public');

        Picture::create([
            'user_id' => auth()->id(),
            'url' => $path
        ]);
    }
    public function destroyPicture(Picture $picture)
    {
        Storage::disk('public')->delete($picture->url);
        $picture->delete();
    }



}
