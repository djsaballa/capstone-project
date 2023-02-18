<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Temp Routing
Route::get('/', function () {
    return view('dashboard');
});

Route::get('/list-of-profiles', function () {
    return view('list-of-profiles');
});

Route::get('/list-of-users', function () {
    return view('list-of-users');
});

Route::get('/inbox', function () {
    return view('inbox');
});

Route::get('/audit-logs', function () {
    return view('audit-logs');
});

Route::get('/archive', function () {
    return view('archive');
});