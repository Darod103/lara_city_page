<?php

namespace App\Http\Controllers;


use App\Models\TrainSchedule;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\TrainScheduleServices;
use App\Http\Requests\Schedule\ScheduleStoreRequest;


class TrainScheduleController extends Controller
{
    protected TrainScheduleServices $trainScheduleServices;

    public function __construct(TrainScheduleServices $trainScheduleServices)
    {
        $this->trainScheduleServices = $trainScheduleServices;
    }

    /**
     * Return a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $allSchedules = $this->trainScheduleServices->getAllSchedules();

        return view('train-schedules.index', compact('allSchedules'));
    }

    /**
     * Show the form for creating a new resource.
     * @param TrainSchedule $schedule
     * @return View
     */
    public function show(TrainSchedule $schedule): View
    {
        return view('train-schedules.edit', compact('schedule'));
    }

    /**
     * Update schedules
     * @param ScheduleStoreRequest $request
     * @param TrainSchedule $schedule
     * @return RedirectResponse
     */
    public function update(ScheduleStoreRequest $request, TrainSchedule $schedule): RedirectResponse
    {
        if (!$this->trainScheduleServices->updateSchedule($request, $schedule)) {
            return redirect()->back()->with('error', 'Ошибка при обновлении расписания');
        }

        return redirect()->route('schedules.index')->with('success', 'Успешно обновлено расписание');
    }

    /**
     * Store a newly created resource in storage.
     * @param ScheduleStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ScheduleStoreRequest $request): RedirectResponse
    {
        if (!$this->trainScheduleServices->storeSchedules($request)) {
            return redirect()->back()->with('error', 'Ошибка при добавлении расписания');
        }

        return redirect()->back()->with('success', 'Успешно добавлено расписание');
    }

    /**
     * Destroy schedules
     * @param TrainSchedule $schedule
     * @return RedirectResponse
     */
    public function destroy(TrainSchedule $schedule): RedirectResponse
    {
        if (!$this->trainScheduleServices->deleteSchedule($schedule)) {
            return redirect()->back()->with('error', 'Ошибка при удалении расписания');
        }

        return redirect()->back()->with('success', 'Успешно удалено расписание');
    }

}
