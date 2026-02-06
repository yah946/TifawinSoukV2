<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CategoryController::class,'index']);

Route::resource('products', ProductController::class);

require_once __DIR__ . '/admin.php';
