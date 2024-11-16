<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryLogController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::prefix('educations')->name('educations.')->controller(EducationController::class)->group(function () {
//     Route::get('/', 'index')->name('index');
//     Route::get('/admin', 'indexAdmin')->name('indexAdmin')->middleware('auth');
//     Route::post('/', 'store')->name('store')->middleware('auth');
//     Route::post('/toggle/{id}', 'editShow')->name('editShow')->middleware('auth');
// });
// Route::prefix('category')->name('category.')->controller(CategoryController::class)->group(function(){

// });

Route::get('/',[ProductController::class,'index']);

Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('inventorylog', InventoryLogController::class);

Route::post('product/{id}/decrease-stock', [ProductController::class, 'decreaseStock'])->name('product.decreaseStock');
Route::post('product/{id}/increase-stock', [ProductController::class, 'increaseStock'])->name('product.increaseStock');