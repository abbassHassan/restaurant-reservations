<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YelpController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard route, only accessible to authenticated users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Reservations resource routes
    Route::resource('reservations', ReservationController::class)->except('destroy');

    // Apply 'role:admin' middleware to the delete route
    Route::delete('reservations/{reservation}', [ReservationController::class, 'destroy'])
        ->middleware([\App\Http\Middleware\RoleMiddleware::class . ':admin'])
        ->name('reservations.destroy');

    // Restaurants route with the correct route name
    Route::get('/restaurants', [YelpController::class, 'fetchRestaurants'])->name('restaurants.index');
});

require __DIR__.'/auth.php';
