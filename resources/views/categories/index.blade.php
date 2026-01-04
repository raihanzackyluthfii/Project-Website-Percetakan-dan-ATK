@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Kategori</h2>
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah Kategori</a>
        </div>

        <div class="row">
            @forelse($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($category->image)
                            <img src="{{ Storage::url($category->image) }}" class="card-img-top" alt="{{ $category->name }}"
                                style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center"
                                style="height: 200px;">
                                <h1>📁</h1>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <p class="card-text">{{ Str::limit($category->description, 100) }}</p>
                            <p class="text-muted">Jumlah Produk: {{ $category->products_count }}</p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-info">Lihat</a>
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
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
                    <div class="alert alert-info">Belum ada kategori. <a href="{{ route('categories.create') }}">Tambah
                            sekarang</a></div>
                </div>
            @endforelse
        </div>
    </div>
@endsection