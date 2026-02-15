<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Schema;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(15);
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
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'name' => 'required|string|max:70',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);
        DB::transaction(function () use ($request, $validated): void {

            $product = Product::create([
                'category_id' =>$validated['category_id'],
                'supplier_id' =>$validated['supplier_id'],
                'name' =>$validated['name'],
                'description' =>$validated['description'],
                'stock' =>$validated['stock'],
                'price' =>$validated['price'],
                'reference' =>str_replace(' ','_',strtolower($validated['name'])).random_int(1,1000),
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    $product->images()->create([
                        'path' => $image->store('products','public'),
                        'cover' => $index === 0,
                    ]);
                }
            }
        });
        return redirect()->route('admin.products.index')->with('success','Product Created');
    }


    /**
     * Display the specified resource.
     */
   public function show(Product $product)
{
    $product->load(['category', 'supplier']);
    return view('admin.products.show', compact('product'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        $images     = $product->images;
    return view('admin.products.edit', compact('categories', 'suppliers', 'images', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Product $product){
    $validated = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'supplier_id' => 'required|exists:suppliers,id',
        'name' => 'required|string|max:70',
        'description' => 'nullable|string',
        'stock' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'images' => 'nullable|array',
        'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        'deleted_images' => 'nullable|array',
        'deleted_images.*' => 'exists:images,id',
    ]);
    DB::transaction(function () use ($request, $validated, $product) {
        $product->update([
            'category_id' => $validated['category_id'],
            'supplier_id' => $validated['supplier_id'],
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'reference' =>str_replace(' ','_',strtolower($validated['name'])).random_int(1,1000),
            'stock' => $validated['stock'],
            'price' => $validated['price'],
        ]);
    if (!empty($validated['deleted_images'])) {
            $coverDeleted = $product->images()
                ->where('cover', true)
                ->whereIn('id', $validated['deleted_images'])
                ->exists();

            $imagesToDelete = $product->images()
                ->whereIn('id', $validated['deleted_images'])
                ->get();

            foreach ($imagesToDelete as $image) {
                Storage::disk('public')->delete($image->path);
                $image->delete();
            }
            if ($coverDeleted) {
                $product->images()
                    ->orderBy('id')
                    ->first()
                    ?->update(['cover' => true]);
            }
        }
        if ($request->hasFile('images')) {
            $hasCover = $product->images()->where('cover', true)->exists();
            foreach ($request->file('images') as $index => $image) {
                $product->images()->create([
                    'path' => $image->store('products', 'public'),
                    'cover' => !$hasCover && $index === 0,
                ]);
            }
        }
    });


    return redirect()
        ->route('admin.products.index')
        ->with('success', 'Product has been updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }

}



