<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function store(Request $request, $id)
    {
        $userId = auth()->id();

        if (Vote::where('user_id', $userId)->where('picture_id', $id)->exists()) {
            return back()->with('error', 'Вы уже голосовали за эту фотографию.');
        }


        Vote::create([
            'user_id' => $userId,
            'picture_id' => $id,
        ]);

        return back()->with('success', 'Ваш голос учтен!');
    }
}
