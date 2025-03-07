<?php

namespace App\View\Components;

use App\Models\Picture;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PictureCard extends Component
{
    public Picture $picture;
    /**
     * Create a new component instance.
     */
    public function __construct(Picture $picture)
    {
        $this->picture = $picture;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.picture-card');
    }
}
