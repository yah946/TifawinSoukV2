<?php

// use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index']);
Route::get('/', action: [ProductController::class, 'filter'])->name('index.filter');
// Route::post('/', [ProductController::class, 'store'])->name('products.store');

// Route::resource('products', ProductController::class);

// require_once __DIR__ ."/admin.php";

