<?php

namespace App\Services;

use App\Models\Vote;

class VoteServices
{
    /**
     * Check if the user has already voted for the picture.
     *
     * @param ?int $userId
     * @param int $pictureId
     * @return bool
     */
    public function hasVoted(?int $userId, int $pictureId)
    {
        if (is_null($userId)) {
            return false; // Неавторизованный пользователь не может голосовать
        }

        return Vote::where('user_id', $userId)->where('picture_id', $pictureId)->exists();
    }

    public function storeVote($id)
    {
        $userId = auth()->id();

        if ($this->hasVoted($userId, $id)) {
            return back()->with('error', 'Вы уже голосовали за эту фотографию.');
        }

        Vote::create([
            'user_id' => $userId,
            'picture_id' => $id,
        ]);

        return back()->with('success', 'Ваш голос учтен!');
    }
}
