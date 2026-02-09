<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
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

        Route::get('/products/{product}', 'show')->name('show');
    });


Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])
    ->name('products.destroy');

require_once __DIR__ ."/admin.php";
