<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::resource('reserves', ReserveController::class);
Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [ReserveController::class, 'other'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/admin', [UserController::class, 'adminIndex'])
    ->middleware(['auth', 'verified'])
    ->name('admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//usuario
Route::get('/perfil/{id}', [UserController::class, 'edit'])->name('perfil.edit');
Route::post('/perfil',[UserController::class, 'update'])->name('perfil.update');

//prueba
Route::get('/reserves', [ReserveController::class, 'index'])->name('reserves.index');


//events
Route::get('events', [EventController::class, 'index'])->name('events.index');
Route::get('events/create', [EventController::class, 'create'])->name('events.create');
Route::post('events', [EventController::class, 'store'])->name('events.store');
Route::get('events/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('events/{id}', [EventController::class, 'update'])->name('events.update');
Route::delete('events/{id}', [EventController::class, 'destroy'])->name('events.destroy');


require __DIR__.'/auth.php';
