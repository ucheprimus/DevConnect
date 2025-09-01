<?php

use App\Http\Controllers\Dev\DevController;
use App\Http\Controllers\Employer\EmployerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('employer')->middleware('role.check:employer')->group(function () {
    Route:: get('/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');
    Route:: get('/settings', [EmployerController::class, 'settings'])->name('employer.settings');


});

Route::prefix('developer')->middleware('role.check:developer')->group(function () {
    Route:: get('/dashboard', [DevController::class, 'dashboard'])->name('dev.dashboard');
    Route:: get('/settings', [DevController::class, 'settings'])->name('dev.settings');


});

// // Worker routes
// Route::middleware(['auth', 'role.check:worker'])->group(function () {
//     Route::get('/worker/dashboard', [WorkerController::class, 'index'])->name('worker.dashboard');
// });

// // Vendor routes
// Route::middleware(['auth', 'role.check:vendor'])->group(function () {
//     Route::get('/vendor/dashboard', [VendorController::class, 'index'])->name('vendor.dashboard');
// });

