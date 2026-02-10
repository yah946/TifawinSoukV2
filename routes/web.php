<?php

use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\PaypalController;
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
Route::get('/paypal/create/{order}', [PaypalController::class, 'create'])->name('paypal.create');
Route::get('/paypal/success', [PaypalController::class, 'success'])->name('paypal.success');
Route::get('/paypal/cancel', [PaypalController::class, 'cancel'])->name('paypal.cancel');


require_once __DIR__ ."/admin.php";
require_once __DIR__.'/auth.php';
require_once __DIR__.'/client.php';
