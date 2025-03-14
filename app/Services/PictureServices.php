<?php

namespace App\Services;

use App\Http\Requests\Gallery\PictureStoreRequest;
use App\Models\Picture;
use Illuminate\Support\Facades\Storage;

class PictureServices
{
    /**
     * Get all pictures with vote counts, sorted by vote count in descending order.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Picture::withCount('votes')->orderByDesc('votes_count')->get();
    }

    /**
     * Save a picture.
     *
     * @param PictureStoreRequest $request
     * @return void
     */
    public function storePicture(PictureStoreRequest $request)
    {
        $path = $request->file('picture')->store('pictures', 'public');

        Picture::create([
            'user_id' => auth()->id(),
            'url' => $path
        ]);
    }

    /**
     * Delete a picture.
     *
     * @param Picture $picture
     * @return void
     */
    public function destroyPicture(Picture $picture)
    {
        Storage::disk('public')->delete($picture->url);
        $picture->delete();
    }

}
