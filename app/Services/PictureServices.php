<?php

namespace App\Services;

use App\Models\Picture;
use Illuminate\Support\Facades\DB;
use App\Services\TransactionServices;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Gallery\PictureStoreRequest;


class PictureServices
{
    protected TransactionServices $transactionServices;

    public function __construct(TransactionServices $transactionServices)
    {
        $this->transactionServices = $transactionServices;
    }

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
     * @return bool
     */
    public function storePicture(PictureStoreRequest $request): bool
    {
        $path = $request->file('picture')->store('pictures', 'public');
        $result = $this->transactionServices->run(function () use ($path) {
            Picture::create([
                'user_id' => auth()->id(),
                'url' => $path
            ]);
        });
        if (!$result) {
            // If the transaction fails, delete the uploaded file
            Storage::disk('public')->delete($path);
        }
        return $result;
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
