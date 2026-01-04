@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Detail Kategori</h4>
                        <a href="{{ route('categories.index') }}" class="btn btn-light btn-sm">Kembali</a>
                    </div>
                    <div class="card-body">
                        @if($category->image)
                            <div class="text-center mb-4">
                                <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}"
                                    class="img-fluid rounded" style="max-height: 300px; object-fit: cover;">
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <tr>
                                <th width="200">Nama Kategori</th>
                                <td>{{ $category->name }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $category->description ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Produk</th>
                                <td>{{ $category->products->count() }} produk</td>
                            </tr>
                            <tr>
                                <th>Dibuat pada</th>
                                <td>{{ $category->created_at->format('d F Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Terakhir diupdate</th>
                                <td>{{ $category->updated_at->format('d F Y, H:i') }}</td>
                            </tr>
                        </table>

                        <div class="d-flex gap-2 mt-3">
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">
                                ✏️ Edit Kategori
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                @if($category->products->count() > 0)
                    <div class="card mt-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Produk dalam Kategori Ini</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($category->products as $product)
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $product->name }}</h6>
                                                <p class="text-success mb-1">Rp {{ number_format($product->price, 0, ',', '.') }}
                                                </p>
                                                <p class="text-muted mb-0">Stok: {{ $product->stock }}</p>
                                            </div>
                                            <div class="card-footer bg-transparent">
                                                <a href="{{ route('products.show', $product) }}"
                                                    class="btn btn-sm btn-primary">Lihat Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection