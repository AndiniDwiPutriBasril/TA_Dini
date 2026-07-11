<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\AkunController;

Route::get('/', function () { 
    return view('welcome');
});

Route::get( '/api/realtime', [DashboardController::class, 'realtime']);
     
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

    Route::get('/histori', [HistoriController::class, 'index'])
    ->name('histori');

    Route::get('/akun', [AkunController::class, 'index'])
    ->name('akun');

    Route::post('/akun/update', [AkunController::class, 'update'])
    ->name('akun.update');

    Route::get('/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit');

    Route::post('/profile', [ProfileController::class, 'update'])
    ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
    ->name('profile.destroy');

    Route::delete('/monitoring/{id}', [DashboardController::class, 'monitoring'])
    ->name('monitoring.destroy');
});

require __DIR__.'/auth.php';
