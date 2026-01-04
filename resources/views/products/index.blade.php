@extends('layouts.app')

@section('title', 'Produk')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Produk</h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Produk</a>
        </div>

        <div class="row">
            @forelse($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($product->image)
                            <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}"
                                style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center"
                                style="height: 200px;">
                                <h1>📦</h1>
                            </div>
                        @endif
                        <div class="card-body">
                            <span class="badge bg-primary mb-2">{{ $product->category->name }}</span>
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 80) }}</p>
                            <h4 class="text-success">Rp {{ number_format($product->price, 0, ',', '.') }}</h4>
                            <p class="text-muted mb-0">Stok: {{ $product->stock }}</p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info">Lihat</a>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">Belum ada produk. <a href="{{ route('products.create') }}">Tambah sekarang</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection