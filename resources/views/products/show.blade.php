@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Detail Produk</h4>
                        <a href="{{ route('products.index') }}" class="btn btn-light btn-sm">Kembali</a>
                    </div>
                    <div class="card-body">
                        @if($product->image)
                            <div class="text-center mb-4">
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                                    class="img-fluid rounded" style="max-height: 400px; object-fit: cover;">
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <tr>
                                <th width="200">Nama Produk</th>
                                <td><strong>{{ $product->name }}</strong></td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>
                                    <span class="badge bg-primary">{{ $product->category->name }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $product->description ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>
                                    <h5 class="text-success mb-0">Rp {{ number_format($product->price, 0, ',', '.') }}</h5>
                                </td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td>
                                    @if($product->stock > 0)
                                        <span class="badge bg-success">{{ $product->stock }} tersedia</span>
                                    @else
                                        <span class="badge bg-danger">Habis</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Dibuat pada</th>
                                <td>{{ $product->created_at->format('d F Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Terakhir diupdate</th>
                                <td>{{ $product->updated_at->format('d F Y, H:i') }}</td>
                            </tr>
                        </table>

                        <div class="d-flex gap-2 mt-3">
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">
                                ✏️ Edit Produk
                            </a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                    🗑️ Hapus
                                </button>
                            </form>
                            @if($product->stock > 0)
                                <a href="{{ route('orders.create') }}?product={{ $product->id }}"
                                    class="btn btn-primary ms-auto">
                                    🛒 Pesan Produk
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection