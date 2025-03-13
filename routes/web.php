<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('home');

//TODO Сделать норм роутинг
Route::get('/gallery',[PictureController::class,'index'])->name('gallery.index');
Route::middleware('auth')->group(function () {
    Route::post('/gallery',[PictureController::class,'store'])->name('gallery.store');
    Route::post('/gallery/{id}/vote',[\App\Http\Controllers\VoteController::class,'store'])->name('gallery.vote');
    Route::delete('/gallery/{picture}',[PictureController::class,'destroy'])->name('gallery.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/news.php';
require __DIR__.'/auth.php';

