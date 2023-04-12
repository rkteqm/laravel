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

Route::get('/', function () {
    return view('home');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});