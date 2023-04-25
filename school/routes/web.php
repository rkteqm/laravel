<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
    // return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('user/register', [UserController::class, 'create'])
    ->name('user.register');

Route::post('user/register', [UserController::class, 'store']);

require __DIR__ . '/auth.php';


// Admin
require __DIR__ . '/admin/auth.php';


// Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    // Route::get('login', function () {
    //     return view('admin.auth.login');
    // });
    // Route::namespace('Auth')->group(function () {
        // login route
        // Route::get('login', 'AuthenticatedSessionController@create')->name('login');
        // Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
//     });
// });
