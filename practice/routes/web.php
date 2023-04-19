<?php

use Illuminate\Routing\Route as RoutingRoute;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/users/index', function () {
//     return view('/users/index');
// });

// Route::get('/demo', function () {
//     echo "Hello World!";
// });

// // name is compulsry & is ID is optional
// Route::get('/demo/{name}/{id?}', function ($name, $id = null) {
//     echo $name;
//     echo '<br>';
//     echo $id;
//     echo '<br>';

//     // for printing data in array using compact funtion of php
//     $data = compact('name', 'id');
//     // print_r($data);

//     return view('/users/index')->with($data);
// });

// Route::get('/template/{name?}', function ($name = null) {
//     $demo = '<h2>Hello World</h2>';
//     $data = compact('name', 'demo');
//     return view('home')->with($data);
// });

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/services', function () {
//     return view('services');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::get('/about', function () {
//     return view('about');
// });


// // Using democontroller for routing----------------BASIC CONTROLLER
// use App\Http\Controllers\DemoController;

// Route::get('/', [DemoController::class, 'home']);
// Route::get('/services', [DemoController::class, 'services']);
// Route::get('/contact', [DemoController::class, 'contact']);

// // This is another way of routing
// Route::get('/about', 'App\Http\Controllers\DemoController@about');

// // Using singleactioncontroller for routing----------------SINGLE ACTION CONTROLLER
// use App\Http\Controllers\SingleActionController;

// Route::get('/users/index', SingleActionController::class);

// // Using singleactioncontroller for routing----------------RESOURCE CONTROLLER
// use App\Http\Controllers\ProductController;

// Route::resource('/product', ProductController::class);


// // Registration controller
// use App\Http\Controllers\RegistrationController;

// Route::get('/register', [RegistrationController::class, 'index']);
// Route::post('/register', [RegistrationController::class, 'register']);

// // Printing data from database using customer model
// use App\Models\Customer;
// Route::get('/customer', function () {
//     $customers = Customer::all();
//     echo "<pre>";
//     // print_r($customers); // in object
//     print_r($customers->toArray()); // in array
// });


// insert data using form
use App\Http\Controllers\CustomerController;

// Route::resource('/customer', CustomerController::class);

// commenting for group routing
// Route::get('/customer/create', [CustomerController::class, 'create']);
// Route::get('/customer/{id}/edit', [CustomerController::class, 'edit']);
// Route::get('/customer/{id}/show', [CustomerController::class, 'show']);
// Route::post('/customer/create', [CustomerController::class, 'store'])->name('customer.create');
// Route::get('/customer', [CustomerController::class, 'index']);
// Route::get('/customer/destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
// Route::get('/customer/trash/{id}', [CustomerController::class, 'trash'])->name('customer.trash');
// Route::get('/customer/trashdata', [CustomerController::class, 'trashdata'])->name('customer.trashdata');
// Route::get('/customer/restore/{id}', [CustomerController::class, 'restore'])->name('customer.restore');
// Route::get('/customer/pdelete/{id}', [CustomerController::class, 'pdelete'])->name('customer.pdelete');
// Route::post('/customer/{id?}/edit', [CustomerController::class, 'update']);
// Route::post('/customer/storefile', [CustomerController::class, 'storefile']);
// Route::get('/customer/upload', function () {
//     return view('customer.upload');
// });

// // group routing
// Route::group(['prefix' => 'customer'], function () {
//     Route::get('/create', [CustomerController::class, 'create']);
//     Route::get('/{id}/edit', [CustomerController::class, 'edit']);
//     Route::get('/{id}/show', [CustomerController::class, 'show']);
//     Route::post('/create', [CustomerController::class, 'store'])->name('customer.create');
//     Route::get('', [CustomerController::class, 'index']);
//     Route::get('/destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
//     Route::get('/trash/{id}', [CustomerController::class, 'trash'])->name('customer.trash');
//     Route::get('/trashdata', [CustomerController::class, 'trashdata'])->name('customer.trashdata');
//     Route::get('/restore/{id}', [CustomerController::class, 'restore'])->name('customer.restore');
//     Route::get('/pdelete/{id}', [CustomerController::class, 'pdelete'])->name('customer.pdelete');
//     Route::post('/{id?}/edit', [CustomerController::class, 'update']);
//     Route::post('/storefile', [CustomerController::class, 'storefile']);
//     Route::get('/upload', function () {
//         return view('customer.upload');
//     });
// });

// applying authentication
Route::group(['prefix' => 'customer'], function () {
    Route::get('/create', [CustomerController::class, 'create']);
    Route::post('/create', [CustomerController::class, 'store'])->name('customer.create');
    Route::get('/login', function () {
        return view('customer.login');
    });
    Route::post('/login', [CustomerController::class, 'login']);
});
Route::get('/', [CustomerController::class, 'home']);
Route::post('/', [CustomerController::class, 'home']);


// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('customer/{id}/edit', [CustomerController::class, 'edit']);
    Route::get('customer/{id}/show', [CustomerController::class, 'show']);
    Route::get('/dashboard', [CustomerController::class, 'index']);
    Route::get('customer/', [CustomerController::class, 'index']);
    Route::get('customer/destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    Route::get('customer/trash/{id}', [CustomerController::class, 'trash'])->name('customer.trash');
    Route::get('customer/trashdata', [CustomerController::class, 'trashdata'])->name('customer.trashdata');
    Route::get('customer/restore/{id}', [CustomerController::class, 'restore'])->name('customer.restore');
    Route::get('customer/pdelete/{id}', [CustomerController::class, 'pdelete'])->name('customer.pdelete');
    Route::post('customer/{id?}/edit', [CustomerController::class, 'update']);
    Route::post('customer/storefile', [CustomerController::class, 'storefile']);
    Route::get('customer/upload', function () {
        return view('customer.upload');
    });
});

require __DIR__ . '/auth.php';

// use Illuminate\Support\Facades\App;
// Route::group(['prefix' => 'language'], function () {
//     Route::get('/{lang?}', function ($lang = null) {
//         App::setLocale($lang);
//         return view('language');
//     });
// });


// one to one relation 
// use App\Http\Controllers\UserController;
// Route::get('/data', [UserController::class, 'index']);
