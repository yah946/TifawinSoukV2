<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()?->get('cart', []);
        $total = 0;

        // Calculer le total du panier
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    public function addProduct(Product $product, Request $request): RedirectResponse
    {
        $quantity = (int) $request->input('quantity', 1);
        $cart = session()->get('cart', []);

        // Vérifier si le produit existe déjà dans le panier
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->cover?->path
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produit ajouté au panier avec succès!');
    }

    public function removeProduct(int $productId): RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produit supprimé du panier!');
    }

    public function clearCart(): RedirectResponse
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Panier vidé avec succès!');
    }

    public function validate(Request $request)
    {
        $methodPayment = $request->input('payment_method');
        $cart = session()->get('cart', []);

        // Vérifier si le panier est vide
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Votre panier est vide!');
        }

        // Calculer le total
        $total = 0;
        foreach ($cart as $item) {
            $total += (float) $item['price'] * (int)$item['quantity'];
        }

        // Créer la commande
        $order = Order::create([
            'tracking_number' => 'CMD-' . time(),
            'total' => $total,
            'is_draft' => false,
            'status' => Order::STATUS_PENDING,
            'payment_method' => $methodPayment,
            'user_id' => Auth::id()
        ]);

        // Créer les éléments de commande
        foreach ($cart as $productId => $item) {
            $quantity = (int)$item['quantity'];
            $order->products()->syncWithoutDetaching([
                $productId => ['quantity' => $quantity, 'unit_price' => (float)$item['price']]
            ]);

            // Mettre à jour le stock du produit
            $product = Product::find($productId);
            if ($product) {
                $product->decrement('stock', $quantity);
            }
        }

        if ($methodPayment === Order::PAYMENT_METHOD_PAYPAL) {
            return redirect()->route('paypal.create', ['order' => $order]);
        }
        // Vider le panier
        session()->forget('cart');

        return redirect()->route('products.index')->with('success', 'Commande passée avec succès! Numéro de suivi: ' . $order->tracking_number);
    }
}
