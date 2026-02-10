<?php

use App\Http\Controllers\Client\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\PaypalController;

// resources de cart
Route::controller(CartController::class)
    ->name('cart.')
    ->prefix('cart')
    ->group(function () {
        Route::get('/', 'index')
            ->name('index');

        Route::post('/{product}/add-product', 'addProduct')
            ->name('add-product');

        Route::delete('/remove/{productId}', 'removeProduct')
            ->name('remove');

        Route::post('/clear', 'clearCart')
            ->name('clear');

        Route::post('/validate', 'validate')
            ->middleware('auth')
            ->name('validate');
    });
Route::middleware('auth')->group(function(){
    Route::get('/paypal/create/{order}', [PaypalController::class, 'create'])->name('paypal.create');
    Route::get('/paypal/success', [PaypalController::class, 'success'])->name('paypal.success');
    Route::get('/paypal/cancel', [PaypalController::class, 'cancel'])->name('paypal.cancel');
});