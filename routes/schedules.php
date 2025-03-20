<?php


use App\Http\Controllers\TrainScheduleController;
use Illuminate\Support\Facades\Route;


Route::prefix('schedules')->controller(TrainScheduleController::class)->group(function () {
    Route::get('/', 'index')->name('schedules.index');
    Route::middleware('auth')->group(function () {
        Route::post('/', 'store')->name('schedules.store');
        Route::get('/{schedule}', 'show')->name('schedules.show');
        Route::delete('/{schedule}', 'destroy')->name('schedules.destroy');
        Route::put('/{schedule}', 'update')->name('schedules.update');
    });
});
