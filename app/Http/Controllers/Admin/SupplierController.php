<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\StoreSupplierRequest;
use App\Http\Requests\Supplier\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\RedirectResponse;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.supplier.index', [
            'suppliers' => Supplier::orderByDesc('created_at')->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request): RedirectResponse
    {
        Supplier::create($request->validated());

        return redirect()->route('admin.suppliers.index')->with('success', 'Supplier created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        $supplier->load(['products.category', 'products.images']);
        return view('admin.supplier.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('admin.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier): RedirectResponse
    {
        $supplier->update($request->validated());
        return redirect()->route('admin.suppliers.index')->with('success', 'Supplier updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('admin.suppliers.index')->with('success', 'Supplier deleted successfully');
    }

    /**
     * Display a listing of the trashed resource.
     */
    public function trashed()
    {
        return view('admin.supplier.trashed', [
            'suppliers' => Supplier::onlyTrashed()->orderByDesc('created_at')->paginate(30)
        ]);
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(Supplier $supplier): RedirectResponse
    {
        $supplier->restore();
        return redirect()->route('admin.suppliers.trashed')->with('success', 'Supplier restored successfully');
    }

    /**
     * Remove the specified resource from storage permanently.
     */
    public function forceDestroy(Supplier $supplier)
    {
        $supplier->forceDelete();
        return redirect()->route('admin.suppliers.trashed')->with('success', 'Supplier permanently deleted successfully');
    }

}
