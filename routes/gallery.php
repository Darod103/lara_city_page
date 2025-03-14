<?php

use App\Http\Controllers\PictureController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;

Route::prefix('gallery')->controller(PictureController::class)->group(function () {
    Route::get('/', 'index')->name('gallery.index');
    Route::middleware('auth')->group(function () {
        Route::post('/',[PictureController::class,'store'])->name('gallery.store');
        Route::post('/{id}/vote',[VoteController::class,'store'])->name('gallery.vote');
        Route::delete('/{picture}',[PictureController::class,'destroy'])->name('gallery.destroy');
    });
});
