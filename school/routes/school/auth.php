<?php

use App\Http\Controllers\School\StaffController;
use App\Http\Controllers\School\Auth\AuthenticatedSessionController;
use App\Http\Controllers\School\Auth\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware('guest:school')->prefix('school')->name('school.')->group(function () {

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');
});

Route::middleware('school')->prefix('school')->name('school.')->group(function () {

    Route::get('dashboard/{slug}' , [StaffController::class, 'index'])->name('dashboard');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
