<?php

namespace App\Services;

use App\Models\Picture;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
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
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Picture::withCount('votes')->orderByDesc('votes_count')->get();
    }

    /**
     * Save a picture.
     *
     * @param PictureStoreRequest $request
     * @return Picture|string
     */
    public function storePicture(PictureStoreRequest $request): Picture|string
    {
        $path = $request->file('picture')->store('pictures', 'public');
        $picture = $this->transactionServices->run(function () use ($path) {
            Picture::create([
                'user_id' => auth()->id(),
                'url' => $path
            ]);
        });
        if (!$picture) {
            // If the transaction fails, delete the uploaded file
            Storage::disk('public')->delete($path);
            return 'Ошибка при загрузке изображения';
        }

        return $picture;
    }

    /**
     * Delete a picture.
     *
     * @param Picture $picture
     * @return void
     */
    public function destroyPicture(Picture $picture): void
    {
        Storage::disk('public')->delete($picture->url);
        $picture->delete();
    }

}
