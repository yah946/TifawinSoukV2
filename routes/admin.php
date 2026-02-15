<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')
    ->prefix('admin')
    // ->middleware(['auth','admin'])
    ->group(function () {
        // resource of admin
        Route::get('', [HomeController::class, 'dashboard'])
                ->name('dashboard');

        // Resource of products
         Route::controller(ProductController::class)
             ->group(function () {
                 Route::get('/products', 'index')
                     ->name('products.index');

                 Route::get('/products/create', 'create')
                     ->name('products.create');

                 Route::post('/products', 'store')
                     ->name('products.store');

                 Route::get('/products/{product}','show')
                     ->name('products.show');

                 Route::get('/products/{product}/edit','edit')
                     ->name('products.edit');

                 Route::put('/products/{product}/update','update')
                     ->name('products.update');

                 Route::delete('/products/{product}','destroy')
                     ->name('products.destroy');
             });

        // Resource of categories
        Route::controller(CategoryController::class)
            ->group(function () {
                Route::get('/categories', 'index')
                    ->name('categories.index');

                Route::get('/categories/create', 'create')
                    ->name('categories.create');

                Route::post('/categories', 'store')
                    ->name('categories.store');

                Route::get('/categories/{category}','show')
                    ->name('categories.show');

                Route::get('/categories/{category}/edit','edit')
                    ->name('categories.edit');

                Route::put('/categories/{category}/update','update')
                    ->name('categories.update');

                Route::delete('/categories/{category}','destroy')
                    ->name('categories.destroy');
            });

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

                Route::get('show/{order}', 'show')
                    ->name('show');

                Route::delete('destroy', 'destroy')
                    ->name('destroy');
            });
    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
