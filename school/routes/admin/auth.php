<?php

use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');
});

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('dashboard', [SchoolController::class, 'index'])->name('dashboard');

    Route::get('school', [SchoolController::class, 'school'])->name('school');

    Route::get('addschool', [SchoolController::class, 'create'])->name('addschool');

    Route::post('addschool', [SchoolController::class, 'store'])->name('addschool');

    Route::get('test', [SchoolController::class, 'test'])->name('test');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
