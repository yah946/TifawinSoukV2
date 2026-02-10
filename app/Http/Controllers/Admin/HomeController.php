<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        $productCount   = Product::count();
        $categoryCount  = Category::count();
        $supplierCount  = Supplier::count();

        return view('admin.dashboard', compact('productCount', 'categoryCount', 'supplierCount'));
    }
}
