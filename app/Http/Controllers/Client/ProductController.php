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

    public function show(Product $product)
    {
        $product->load('images');
        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->limit(6)->get();
        return view('product.show', compact('product', 'relatedProducts'));
    }
}
