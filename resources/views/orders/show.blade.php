@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Detail Pesanan #{{ $order->id }}</h4>
                        <a href="{{ route('orders.index') }}" class="btn btn-light btn-sm">Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="mb-3">📋 Informasi Pesanan</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="150">ID Pesanan</th>
                                        <td>#{{ $order->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal</th>
                                        <td>{{ $order->created_at->format('d F Y, H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
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
                                            <span class="badge bg-{{ $statusColors[$order->status] }} fs-6">
                                                {{ $statusLabels[$order->status] }}
                                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-6">
                                <h5 class="mb-3">👤 Informasi Pelanggan</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="150">Nama</th>
                                        <td>{{ $order->customer_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $order->customer_email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Telepon</th>
                                        <td>{{ $order->customer_phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $order->customer_address }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h5 class="mb-3">📦 Detail Produk</h5>
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    @if($order->product->image)
                                        <div class="col-md-3">
                                            <img src="{{ Storage::url($order->product->image) }}"
                                                alt="{{ $order->product->name }}" class="img-fluid rounded">
                                        </div>
                                    @endif
                                    <div class="col-md-{{ $order->product->image ? '9' : '12' }}">
                                        <h5 class="mb-2">{{ $order->product->name }}</h5>
                                        <p class="text-muted mb-2">{{ $order->product->description }}</p>
                                        <table class="table table-sm table-borderless mb-0">
                                            <tr>
                                                <td width="150"><strong>Harga Satuan:</strong></td>
                                                <td>Rp {{ number_format($order->product->price, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Jumlah:</strong></td>
                                                <td>{{ $order->quantity }} pcs</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Total Harga:</strong></td>
                                                <td>
                                                    <h5 class="text-success mb-0">Rp
                                                        {{ number_format($order->total_price, 0, ',', '.') }}</h5>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">
                                ✏️ Edit Status
                            </a>
                            <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus pesanan ini?')">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection