<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__. '/schedules.php';
require __DIR__ . '/gallery.php';
require __DIR__ . '/news.php';
require __DIR__ . '/auth.php';

