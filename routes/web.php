<?php

use App\Http\Controllers\Client\ProductController;
use Illuminate\Support\Facades\Route;

Route::controller(ProductController::class)
    ->name('products.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{product}', 'show')
            ->name('show')
        ;
        Route::get('filter', 'filter')
            ->name('filter')
        ;
    });

require_once __DIR__ ."/admin.php";
require_once __DIR__.'/auth.php';
require_once __DIR__.'/client.php';
