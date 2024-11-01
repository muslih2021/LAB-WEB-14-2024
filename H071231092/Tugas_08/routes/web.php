<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home']) ->name('home');
Route::get('/about', [AboutController::class, 'about']) ->name('about');
Route::get('/contact', [ContactController::class, 'contact']) ->name('contact');
