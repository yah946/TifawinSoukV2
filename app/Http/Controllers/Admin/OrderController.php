<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.order.index', ['orders' => Order::orderByDesc('created_at')->paginate()]);
    }

    public function draft()
    {
        return view('admin.order.draft', ['orders' => Order::drafts()->orderByDesc('created_at')->paginate()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load(['user', 'orderItems.product']);
        return view('admin.order.show', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Заказ удален');
    }
}
