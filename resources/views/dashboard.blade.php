@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2>Dashboard</h2>
                <p class="text-muted mb-0">Selamat datang, {{ Auth::user()->name }}!</p>
            </div>
            <div>
                <span class="badge bg-success">Online</span>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-1">Total Kategori</h6>
                                <h2 class="mb-0">{{ $totalCategories }}</h2>
                            </div>
                            <div>
                                <h1>📁</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="{{ route('categories.index') }}" class="text-white text-decoration-none small">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card bg-success text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-1">Total Produk</h6>
                                <h2 class="mb-0">{{ $totalProducts }}</h2>
                            </div>
                            <div>
                                <h1>📦</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="{{ route('products.index') }}" class="text-white text-decoration-none small">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card bg-info text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-1">Total Pesanan</h6>
                                <h2 class="mb-0">{{ $totalOrders }}</h2>
                            </div>
                            <div>
                                <h1>🛒</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="{{ route('orders.index') }}" class="text-white text-decoration-none small">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card bg-warning text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-1">Pesanan Pending</h6>
                                <h2 class="mb-0">{{ $pendingOrders }}</h2>
                            </div>
                            <div>
                                <h1>⏳</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="{{ route('orders.index') }}" class="text-white text-decoration-none small">
                            Proses Sekarang →
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <a href="{{ route('categories.create') }}" class="btn btn-outline-primary w-100">
                                    ➕ Tambah Kategori
                                </a>
                            </div>
                            <div class="col-md-3 mb-2">
                                <a href="{{ route('products.create') }}" class="btn btn-outline-success w-100">
                                    ➕ Tambah Produk
                                </a>
                            </div>
                            <div class="col-md-3 mb-2">
                                <a href="{{ route('orders.create') }}" class="btn btn-outline-info w-100">
                                    ➕ Buat Pesanan
                                </a>
                            </div>
                            <div class="col-md-3 mb-2">
                                <a href="{{ route('orders.index') }}" class="btn btn-outline-warning w-100">
                                    📋 Lihat Semua Pesanan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Pesanan Terbaru</h5>
                        <a href="{{ route('orders.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                    </div>
                    <div class="card-body">
                        @if($recentOrders->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Pelanggan</th>
                                            <th>Produk</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentOrders as $order)
                                            <tr>
                                                <td>{{ $order->customer_name }}</td>
                                                <td>{{ $order->product->name }}</td>
                                                <td>{{ $order->quantity }}</td>
                                                <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                                <td>
                                                    @php
                                                        $statusColors = [
                                                            'pending' => 'warning',
                                                            'processing' => 'info',
                                                            'completed' => 'success',
                                                            'cancelled' => 'danger'
                                                        ];
                                                        $statusLabels = [
                                                            'pending' => 'Menunggu',
                                                            'processing' => 'Diproses',
                                                            'completed' => 'Selesai',
                                                            'cancelled' => 'Dibatalkan'
                                                        ];
                                                    @endphp
                                                    <span class="badge bg-{{ $statusColors[$order->status] }}">
                                                        {{ $statusLabels[$order->status] }}
                                                    </span>
                                                </td>
                                                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-4 text-muted">
                                <h1>📭</h1>
                                <p>Belum ada pesanan</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection