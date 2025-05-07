<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AlbumController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/songs',[SongController ::class, 'index'])->name('songs.index');
Route::get('/songs/create',[SongController ::class, 'create'])->name('songs.create');
Route::post('/songs/create',[SongController::class,'store'])->name ('songs.store');
Route::get('/songs/edit/{id}',[SongController::class,'edit'])->name('songs.edit');
Route::post('/songs/edit/{id}',[SongController::class,'update'])->name('songs.update');
Route::post('/songs/delete/{id}',[SongController::class,'destroy'])->name('songs.destroy');
Route::get('/songs/{id}',[SongController::class,'show'])->name('songs.show');

Route::get('/albums',[AlbumController ::class, 'index'])->name('albums.index');
Route::get('/albums/create',[AlbumController ::class, 'create'])->name('albums.create');
Route::post('/albums/create',[AlbumController::class,'store'])->name ('albums.store');
Route::get('/albums/edit/{id}',[AlbumController::class,'edit'])->name('albums.edit');
Route::put('/albums/edit/{id}',[AlbumController::class,'update'])->name('albums.update');
Route::post('/albums/delete/{id}',[AlbumController::class,'destroy'])->name('albums.destroy');
Route::get('/albums/{id}',[AlbumController::class,'show'])->name('albums.show');

require __DIR__.'/auth.php';
