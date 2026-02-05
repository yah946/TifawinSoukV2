<?php

use App\Http\Controllers\Admin\SupplierController;
use Illuminate\Support\Facades\Route;


// Resource of supplier
Route::controller(SupplierController::class)
    ->name('admin.suppliers.')
    ->prefix('admin/suppliers')
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
