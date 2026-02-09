<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CategoryController::class,'index']);


require_once __DIR__ . '/admin.php';
