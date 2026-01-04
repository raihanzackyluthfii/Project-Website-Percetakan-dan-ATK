@extends('layouts.app')

@section('title', 'Edit Status Pesanan')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Edit Status Pesanan #{{ $order->id }}</h4>
                    </div>
                    <div class="card-body">
                        <!-- Informasi Pesanan -->
                        <div class="alert alert-info">
                            <h6 class="mb-2"><strong>Informasi Pesanan:</strong></h6>
                            <p class="mb-1"><strong>Pelanggan:</strong> {{ $order->customer_name }}</p>
                            <p class="mb-1"><strong>Produk:</strong> {{ $order->product->name }}</p>
                            <p class="mb-1"><strong>Jumlah:</strong> {{ $order->quantity }} pcs</p>
                            <p class="mb-0"><strong>Total:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </p>
                        </div>

                        <form action="{{ route('orders.update', $order) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="status" class="form-label">Status Pesanan *</label>
                                <select class="form-select form-select-lg @error('status') is-invalid @enderror" id="status"
                                    name="status" required>
                                    <option value="pending" {{ old('status', $order->status) == 'pending' ? 'selected' : '' }}>
                                        ⏳ Menunggu
                                    </option>
                                    <option value="processing" {{ old('status', $order->status) == 'processing' ? 'selected' : '' }}>
                                        🔄 Diproses
                                    </option>
                                    <option value="completed" {{ old('status', $order->status) == 'completed' ? 'selected' : '' }}>
                                        ✅ Selesai
                                    </option>
                                    <option value="cancelled" {{ old('status', $order->status) == 'cancelled' ? 'selected' : '' }}>
                                        ❌ Dibatalkan
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="alert alert-warning">
                                <strong>⚠️ Perhatian:</strong>
                                <ul class="mb-0 mt-2">
                                    <li><strong>Pending:</strong> Pesanan baru masuk, belum diproses</li>
                                    <li><strong>Processing:</strong> Pesanan sedang dikerjakan</li>
                                    <li><strong>Completed:</strong> Pesanan selesai dan sudah dikirim</li>
                                    <li><strong>Cancelled:</strong> Pesanan dibatalkan</li>
                                </ul>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('orders.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Update Status</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Timeline Status (Optional) -->
                <div class="card mt-4">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">📅 Riwayat Pesanan</h6>
                    </div>
                    <div class="card-body">
                        <div class="timeline">
                            <div class="mb-3">
                                <small class="text-muted">Dibuat pada:</small><br>
                                <strong>{{ $order->created_at->format('d F Y, H:i:s') }}</strong>
                            </div>
                            <div>
                                <small class="text-muted">Terakhir diupdate:</small><br>
                                <strong>{{ $order->updated_at->format('d F Y, H:i:s') }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection