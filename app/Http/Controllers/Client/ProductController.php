<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('index',[
            'products' => Product::all(),
            'categories' => Category::all()
        ]);
    }
    public function filter(Request $request)
    {
        $products = Product::query()
            ->when($request->search,function($q,$search){
                $q->where('name','like','%{$search}%');
            })
            ->when($request->c,function($q,$category_id){
                $q->where('category_id',$category_id);
            })
            ->when($request->min_price,function($q,$min){
                $q->where('price','>=',$min);
            })
            ->when($request->max_price,function($q,$max){
                $q->where('price','<=',$max);
            })->get();
        return view('index',[
            'products' => $products,
            'categories' => Category::all()
        ]);
    }
}
