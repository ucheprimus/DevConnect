<?php

use App\Http\Controllers\Dev\DevController;
use App\Http\Controllers\Employer\EmployerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('employer')->middleware('role.check:employer')->group(function () {
    Route:: get('/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');
    Route:: get('/settings', [EmployerController::class, 'settings'])->name('employer.settings');
    Route:: get('/job_post', [EmployerController::class, 'jobpost'])->name('jobpost');
    Route:: post('/job_post', [EmployerController::class, 'jobstore'])->name('jobstore');
    Route:: get('/job/{job}', [EmployerController::class, 'jobedit'])->name('jobedit');
    Route::put('/jobs/{job}', [EmployerController::class, 'jobupdate'])->name('jobs.update');
    Route::delete('/jobs/{job}', [EmployerController::class, 'jobdestroy'])->name('jobs.destroy');


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

