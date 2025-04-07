<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);


Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// User dashboard and payment routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\UserDashboardController::class, 'index'])->name('dashboard');
    Route::post('/payment/process', [App\Http\Controllers\PaymentController::class, 'processPayment'])->name('payment.process');
    Route::get('/payment/history', [App\Http\Controllers\PaymentController::class, 'showPaymentHistory'])->name('payment.history');
});
Route::get('/active', [PlanController::class, 'index'])->name('active');
Route::post('/subscribe', [PlanController::class, 'subscribe'])->name('subscribe');
require __DIR__.'/auth.php';
