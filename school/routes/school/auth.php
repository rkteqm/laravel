<?php

use App\Http\Controllers\School\ArticleController;
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

    Route::get('dashboard/{slug?}', [ArticleController::class, 'index'])->name('dashboard');

    Route::get('addarticle/{slug?}', [ArticleController::class, 'create'])
        ->name('addarticle');

    Route::post('addarticle', [ArticleController::class, 'store'])
        ->name('addarticle');

    Route::get('articles/{slug?}', [ArticleController::class, 'show'])
        ->name('articles');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
