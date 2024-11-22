<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('reserves', [ReserveController::class, 'index'])->name('reserves.index');
    Route::get('reserves/user', [ReserveController::class, 'index'])->name('reserves.user.index');
    Route::get('reserves/admin', [ReserveController::class, 'index'])->name('reserves.admin.index');
    Route::get('reserves/create/user', [ReserveController::class, 'create'])->name('reserves.user.create');
    Route::get('reserves/create/admin', [ReserveController::class, 'create'])->name('reserves.admin.create');
    Route::get('reserves/admin/edit/{id}', [ReserveController::class, 'edit'])->name('reserves.admin.edit');
    Route::get('reserves/admin/{id}', [ReserveController::class, 'show'])->name('reserves.user.show');
    Route::put('reserves/{id}', [ReserveController::class, 'update'])->name('reserves.update');
    Route::post('reserves', [ReserveController::class, 'store'])->name('reserves.store');
    Route::delete('reserves/{id}', [ReserveController::class, 'destroy'])->name('reserves.destroy');

    Route::get('events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('events', [EventController::class, 'store'])->name('events.store');
    Route::get('events/{id}', [EventController::class, 'show'])->name('events.show');
    Route::get('events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__ . '/auth.php';
