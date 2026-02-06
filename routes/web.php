<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index']);

Route::get('/admin', [ProductController::class, 'dashboard'])
    ->name('admin.dashboard');

/* Admin */
Route::get('/admin/products', [ProductController::class, 'index'])
    ->name('admin.products.index');



Route::get('/admin/products/create', [ProductController::class, 'create'])
    ->name('products.create');

Route::post('/admin/products', [ProductController::class, 'store'])
    ->name('products.store');

Route::get('/admin/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])
    ->name('products.edit');

Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])
    ->name('products.destroy');



