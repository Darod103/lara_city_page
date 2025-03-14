<?php
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::prefix('news')->controller(NewsController::class)->group(function () {
    Route::get('/', 'index')->name('news.index');
    Route::post('/', 'store')->name('news.store');
    Route::get('/{news}', 'show')->name('news.show');
    Route::delete('/{news}', 'destroy')->name('news.destroy');
});
