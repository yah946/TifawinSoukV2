<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SupplierController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        // Resource of supplier
        Route::controller(SupplierController::class)
            ->name('suppliers.')
            ->prefix('suppliers')
            ->group(function () {
                Route::get('/', 'index')
                    ->name('index');

                Route::get('create', 'create')
                    ->name('create');

                Route::post('store', 'store')
                    ->name('store');

                Route::get('edit/{supplier}', 'edit')
                    ->name('edit');

                Route::put('update/{supplier}', 'update')
                    ->name('update');

                Route::delete('destroy/{supplier}', 'destroy')
                    ->name('destroy');

                Route::get('show/{supplier}', 'show')
                    ->name('show');

                Route::get('trashed', 'trashed')
                    ->name('trashed');

                Route::put('restore/{supplier}', 'restore')
                    ->withTrashed()
                    ->name('restore');

                Route::delete('force-destroy/{supplier}', 'forceDestroy')
                    ->withTrashed()
                    ->name('force-destroy');
            });

        // Resource of order
        Route::controller(OrderController::class)
            ->name('orders.')
            ->prefix('orders')
            ->group(function () {
                Route::get('/', 'index')
                    ->name('index');

                Route::get('draft', 'draft')
                    ->name('draft');

                Route::get('show', 'show')
                    ->name('show');

                Route::delete('destroy', 'destroy')
                    ->name('destroy');
            });
    });
