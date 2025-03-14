<?php
namespace App\View\Components;

use App\Models\Picture;
use App\Services\VoteServices;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class PictureCard extends Component
{
    public Picture $picture;
    public bool $hasVoted;

    /**
     * Create a new component instance.
     */
    public function __construct(Picture $picture, VoteServices $voteServices)
    {
        $this->picture = $picture;
        $this->hasVoted = $voteServices->hasVoted(Auth::id(), $picture->id);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.picture-card');
    }
}
