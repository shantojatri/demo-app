<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['verified']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    # User Controller routes
    Route::prefix('admin')->controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users.index')->middleware('role:admin,super-admin');
        Route::get('/users/create', 'create')->name('users.create')->middleware('role:admin,super-admin');
        Route::post('/users', 'store')->name('users.store')->middleware('role:admin,super-admin');
        Route::get('/users/{user}', 'show')->name('users.show')->middleware('role:admin,super-admin');
        Route::get('/users/{user}/edit', 'edit')->name('users.edit')->middleware('role:super-admin');
        Route::put('/users/{user}', 'update')->name('users.update')->middleware('role:super-admin');
        Route::delete('/users/{user}', 'destroy')->name('users.destroy')->middleware('role:super-admin');
    });
    // Route::resource('/users', UserController::class)->middleware('role:admin,super-admin');
});

require __DIR__.'/auth.php';
