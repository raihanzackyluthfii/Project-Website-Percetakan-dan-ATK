<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $recentOrders = Order::with('product')->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalCategories',
            'totalProducts',
            'totalOrders',
            'pendingOrders',
            'recentOrders'
        ));
    }
}