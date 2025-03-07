<?php

namespace App\Services;

use App\Http\Requests\News\NewsStoreRequest;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsServices
{

    /**
     * Get all news
     */
    public function getAllNews()
    {
        return News::all();
    }

    /**
     * Save news
     * @return void
     */
    public function storeNews(NewsStoreRequest $request)
    {
        $validatedData = $request->validated();

        $imagePath = $this->handleImageUpload($request);

        News::create([
            'user_id' => auth()->id(),
            'title' => $validatedData['title'],
            'text' => $validatedData['text'],
            'image_url' => $imagePath,
        ]);

    }

    /**
     * Handle image upload
     * @return void
     */
    private function handleImageUpload($request)
    {
        if ($request->hasFile('image')) {
            return $request->file('image')->store('images', 'public');
        }
        return null;
    }

    /**
     * delete news
     * @return void
     */
    public function destroyNews($news)
    {
        if ($news->image_url) {
            Storage::disk('public')->delete($news->image_url);
        }
        $news->delete();
    }

}
