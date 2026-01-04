<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product')->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::where('stock', '>', 0)->get();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|max:20',
            'customer_address' => 'required',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($validated['product_id']);
        
        if ($product->stock < $validated['quantity']) {
            return back()->withErrors(['quantity' => 'Stok tidak mencukupi!']);
        }

        $validated['total_price'] = $product->price * $validated['quantity'];
        
        Order::create($validated);
        
        $product->decrement('stock', $validated['quantity']);

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function show(Order $order)
    {
        $order->load('product');
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $products = Product::all();
        return view('orders.edit', compact('order', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $order->update($validated);

        return redirect()->route('orders.index')->with('success', 'Status pesanan berhasil diupdate!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dihapus!');
    }
}