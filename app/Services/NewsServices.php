<?php

namespace App\Services;

use App\Models\News;
use App\Services\TransactionServices;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\News\NewsStoreRequest;

class NewsServices
{
    protected TransactionServices $transactionServices;

    public function __construct(TransactionServices $transactionServices)
    {
        $this->transactionServices = $transactionServices;
    }

    /**
     * Get all news
     */
    public function getAllNews()
    {
        return News::all();
    }

    /**
     * Save news
     * @return bool
     */
    public function storeNews(NewsStoreRequest $request): bool
    {
        $validatedData = $request->validated();
        $imagePath = $this->handleImageUpload($request);
        $result = $this->transactionServices->run(function () use ($validatedData, $imagePath) {
            News::create([
                'user_id' => auth()->id(),
                'title' => $validatedData['title'],
                'text' => $validatedData['text'],
                'image_url' => $imagePath,
            ]);
        });
        {
            if (!$result && $imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        return $result;
    }

    /**
     * Handle image upload
     * @return string
     */
    private function handleImageUpload( NewsStoreRequest $request): ?string
    {
        if ($request->hasFile('image')) {
            return $request->file('image')->store('images', 'public');
        }

        return null;
    }

    /**
     * delete news
     * @param News $news
     * @return void
     */
    public function destroyNews( News $news) : void
    {
        if ($news->image_url) {
            Storage::disk('public')->delete($news->image_url);
        }
        $news->delete();
    }

}
