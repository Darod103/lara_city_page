<?php

namespace App\Services;


use App\Models\TrainSchedule;
use App\Http\Requests\Schedule\ScheduleStoreRequest;
use Illuminate\Database\Eloquent\Collection;

/*
* Класс TrainScheduleServices
*
* Этот класс предоставляет методы для управления расписаниями поездов.
* Включает методы для получения всех расписаний и добавления новых расписаний.
*/

class TrainScheduleServices
{

    protected TransactionServices $transactionServices;

    public function __construct(TrainSchedule $trainSchedule, TransactionServices $transactionServices)
    {
        $this->transactionServices = $transactionServices;

    }

    /**
     * Получить расписания поездов по убыванию даты и времени отправления
     *
     * @return Collection
     */
    public function getAllSchedules(): Collection
    {
        return TrainSchedule::orderBy('departure_date', 'asc')
            ->orderBy('departure_time', 'asc')
            ->get();
    }

    /**
     * Сохранить новое расписание
     *
     * @param ScheduleStoreRequest $request
     * @return bool
     */
    public function storeSchedules(ScheduleStoreRequest $request): bool
    {
        return $this->transactionServices->run(function () use ($request) {
            TrainSchedule::create($request->validated());
        });
    }

    /**
     * Удалить расписание
     *
     * @param TrainSchedule $schedule
     * @return bool
     */
    public function deleteSchedule(TrainSchedule $schedule): bool
    {
        return $this->transactionServices->run(function () use ($schedule) {
            $schedule->delete();
        });
    }

    /**
     * Обновить расписание
     *
     * @param ScheduleStoreRequest $request
     * @param TrainSchedule $schedule
     * @return bool
     */
    public function updateSchedule(ScheduleStoreRequest $request, TrainSchedule $schedule): bool
    {
        return $this->transactionServices->run(function () use ($request, $schedule) {
            $schedule->update($request->validated());
        });
    }

}
