<?php

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index']);

Route::resource('products', ProductController::class);

require_once __DIR__ . '/admin.php';
