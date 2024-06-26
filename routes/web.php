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

Route::get('/', function () {//Sirve para mostrar la version de laravel
    return ['Laravel' => app()->version()];
});

Route::get('csrf-cookie', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});



