<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\galleryController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [aboutController::class, 'about'])->name('about');
Route::get('/gallery', [galleryController::class, 'gallery'])->name('gallery');
