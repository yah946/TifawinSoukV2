<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('index',[
            'products' => Product::all(),
            'categories' => Category::all()
        ]);
    }
}
