<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\http\Controllers\Homecontroller;
route::get('/', [Homecontroller::class, 'home']);
route::get('/about', [Homecontroller::class, 'about']);
route::get('/contact', [Homecontroller::class, 'contact']);
