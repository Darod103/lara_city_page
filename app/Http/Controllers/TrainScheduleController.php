<?php

namespace App\Http\Controllers;

use App\Http\Requests\Schedule\ScheduleStoreRequest;
use App\Models\TrainSchedule;
use Illuminate\Http\Request;

class TrainScheduleController extends Controller
{
    public function index()
    {
        $allSchedules = TrainSchedule::all();
        return view('train-schedules.index', compact('allSchedules'));
    }

    public function show(TrainSchedule $schedule)
    {
        return view('train-schedules.edit', compact('schedule'));
    }

    public function update(ScheduleStoreRequest $request, TrainSchedule $schedule)
    {

        $schedule->update($request->validated());
        return redirect()->route('schedules.index')->with('success', 'Успешно обновлено расписание');
    }

    public function store(ScheduleStoreRequest $request)
    {
        TrainSchedule::create($request->validated());
        return redirect()->back()->with('success', 'Успешно добавлено расписание');
    }

    public function destroy(TrainSchedule $schedule)
    {
        $schedule->delete();
        return redirect()->back()->with('success', 'Успешно удалено расписание');
    }

}
