<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\guestController;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\staffController;
use App\Http\Controllers\roomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Normal Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('guests', guestController::class);
    Route::resource('bookings', bookingController::class);
    Route::resource('staff', staffController::class);
    Route::resource('rooms', roomController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// ✅ Protect Users Routes: Only for Admins
Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class)->middleware('admin.only');
});
