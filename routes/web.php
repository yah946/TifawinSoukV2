<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('show');
});

Route::resource('products', ProductController::class);

require_once __DIR__ . '/admin.php';
