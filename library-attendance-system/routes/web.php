<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Students routes
    Route::resource('students', StudentController::class);
    Route::get('/students/check/{nis}', [StudentController::class, 'checkNis'])->name('students.check');
    
    // Books routes
    Route::resource('books', BookController::class);
    
    // Attendances routes
    Route::resource('attendances', AttendanceController::class);
    Route::post('/attendances/{attendance}/checkout', [AttendanceController::class, 'checkout'])->name('attendances.checkout');
    Route::get('/monitoring', [AttendanceController::class, 'monitoring'])->name('attendances.monitoring');
    
    // Users routes (only for administrator)
    Route::middleware('can:manage-users')->group(function () {
        Route::resource('users', UserController::class);
    });
});

require __DIR__.'/auth.php';
