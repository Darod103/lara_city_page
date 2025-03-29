<?php

namespace App\Http\Controllers;

use App\Models\TrainSchedule;
use App\Services\TrainScheduleServices;
use App\Http\Requests\Schedule\ScheduleStoreRequest;


class TrainScheduleController extends Controller
{
    protected TrainScheduleServices $trainScheduleServices;

    public function __construct(TrainScheduleServices $trainScheduleServices)
    {
        $this->trainScheduleServices = $trainScheduleServices;
    }

    public function index()
    {
        $allSchedules = $this->trainScheduleServices->getAllSchedules();
        return view('train-schedules.index', compact('allSchedules'));
    }

    public function show(TrainSchedule $schedule)
    {
        return view('train-schedules.edit', compact('schedule'));
    }

    public function update(ScheduleStoreRequest $request, TrainSchedule $schedule)
    {

        if (!$this->trainScheduleServices->updateSchedule($request, $schedule)) {
            return redirect()->back()->with('error', 'Ошибка при обновлении расписания');
        }
        return redirect()->route('schedules.index')->with('success', 'Успешно обновлено расписание');
    }

    public function store(ScheduleStoreRequest $request)
    {
        if(!$this->trainScheduleServices->storeSchedules($request)) {
            return redirect()->back()->with('error', 'Ошибка при добавлении расписания');
        }
        return redirect()->back()->with('success', 'Успешно добавлено расписание');
    }

    public function destroy(TrainSchedule $schedule)
    {
        if (!$this->trainScheduleServices->deleteSchedule($schedule)) {
            return redirect()->back()->with('error', 'Ошибка при удалении расписания');
        }
        return redirect()->back()->with('success', 'Успешно удалено расписание');
    }

}
