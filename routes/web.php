<?php

use App\Http\Controllers\Client\ProductController;
use Illuminate\Support\Facades\Route;

Route::controller(ProductController::class)
    ->name('products.')
    ->group(function () {
        Route::get('/', 'index')->name('index');

        Route::get('/products/{product}', 'show')->name('show');
    });

require_once __DIR__ . '/admin.php';
