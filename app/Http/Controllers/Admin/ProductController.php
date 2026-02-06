<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("admin.products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('admin.products.create', compact('categories', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated['images.*'] = 'image|mimes:jpg,png,jpeg|max:2048';
        DB::transaction(function () use ($request, $validated) {

            $product = Product::create($validated);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    $product->images()->create([
                        'image_path' => $image->store('products','public'),
                        'is_main' => $index === 0,
                    ]);
                }
            }
        });
        return redirect('/product/products')->with('success','Product Created');
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'reference' => 'nullable|string|max:100',
        ]);

        Product::create($validated);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Product created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all() ;
        return view('update',compact('categories','images','suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'name' => 'required|string|max:50',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|gt:0',
        ]);
        $validated['reference'] = str_replace(' ','_',$validated['name']).$validated['supplier_id'];
        $product->update($validated);
        return redirect('/product/products')->with('success','Product has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success','product has been deleted');
    }



    public function dashboard()
{
    $productCount   = Product::count();
    $categoryCount  = Category::count();
    $supplierCount  = Supplier::count();

    return view('admin.dashboard', compact('productCount', 'categoryCount', 'supplierCount'));
}
}