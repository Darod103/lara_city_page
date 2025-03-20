<?php

namespace App\View\Components;
use App\Models\TrainSchedule;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormSchedules extends Component
{
    public TrainSchedule $schedule;

    /**
     * Create a new component instance.
     */
    public function __construct(TrainSchedule $schedule )
    {
        $this->schedule = $schedule;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.schedules-form');
    }
}
