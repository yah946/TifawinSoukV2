<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('Admin.Category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:70',
            'emoji' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create([
            'name' => $request->name,
            'emoji' => $request->emoji,
            'slug' => str_replace(' ','_',str_replace(' & ',' ',$validated['name'])).random_int(1,1000),
            'description' => $request->description,
        ]);

        // return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
         return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:70',
            'emoji' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update([
            'name' => $request->name,
            'emoji' => $request->emoji,
            'slug' => str_replace(' ','_',str_replace(' & ',' ',$validated['name'])).random_int(1,1000),
            'description' => $request->description,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        
        $category->delete();
     
        
    }
}
