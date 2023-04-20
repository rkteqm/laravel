<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [CustomerController::class, 'loginview'])->name('login');
    Route::post('/login', [CustomerController::class, 'login'])->name('login');
    
    Route::get('/register', [CustomerController::class, 'registerview'])->name('register');
    Route::post('/register', [CustomerController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [CustomerController::class, 'index']);
    
    Route::get('/create', [CustomerController::class, 'create'])->name('create');
    Route::post('/create', [CustomerController::class, 'store'])->name('create');

    Route::get('/trash/{id}', [CustomerController::class, 'trash'])->name('trash');

    Route::get('/show/{id}', [CustomerController::class, 'show'])->name('show');

    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [CustomerController::class, 'update'])->name('edit');

    Route::get('/trashdata', [CustomerController::class, 'trashdata'])->name('trashdata');

    Route::get('/restore/{id}', [CustomerController::class, 'restore'])->name('restore');

    Route::get('/pdelete/{id}', [CustomerController::class, 'pdelete'])->name('pdelete');

    Route::get('/logout', [CustomerController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [CustomerController::class, 'index'])->name('dashboard');
});
