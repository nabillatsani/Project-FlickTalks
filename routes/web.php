<?php
// routes/web.php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/movie', [MovieController::class, 'index'])->name('movie');
Route::post('/movie', [MovieController::class, 'store'])->name('movie.store');
Route::get('/movie/create', [MovieController::class, 'create'])->name('movie.create');
Route::delete('/movie/{movie}', [MovieController::class, 'destroy'])->name('movie.destroy');
Route::get('/movie/{movie}/edit', [MovieController::class, 'edit'])->name('movie.edit');
Route::put('/movie/{movie}', [MovieController::class, 'update'])->name('movie.update');
Route::get('/movie/{movie}', [MovieController::class, 'show'])->name('movie.show');
Route::get('/movie/review/{movie}', [MovieController::class, 'review'])->name('movie.review');


Route::get('/review', [ReviewController::class, 'index'])->name('review');
Route::delete('/review/{review}', [ReviewController::class, 'destroy'])->name('review.destroy');
Route::get('/review/{review}/edit', [ReviewController::class, 'edit'])->name('review.edit');
Route::put('/review/{review}', [ReviewController::class, 'update'])->name('review.update');
Route::post('/rreview/{movie}', [ReviewController::class, 'store'])->name('review.store');

Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');

Route::get('/mmovie', [UserController::class, 'index'])->name('user_movie');
Route::get('/rreview', [UserController::class, 'review'])->name('user_review');
Route::delete('/rreview/{review}', [UserController::class, 'destroy'])->name('user_destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
