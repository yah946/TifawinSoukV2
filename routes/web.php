<?php

// use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index']);
// Route::post('/', [ProductController::class, 'store'])->name('products.store');

Route::get('/admin/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])
    ->name('products.edit');

Route::put('/admin/products/{product}', [ProductController::class, 'update'])
    ->name('products.update');


Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])
    ->name('products.destroy');

require_once __DIR__ ."/admin.php";

