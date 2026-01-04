@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Edit Kategori</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.update', $category) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Kategori *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name', $category->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="4">{{ old('description', $category->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            @if($category->image)
                                <div class="mb-3">
                                    <label class="form-label">Gambar Saat Ini</label>
                                    <div>
                                        <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}"
                                            class="img-thumbnail" style="max-height: 200px;">
                                    </div>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar Baru (Opsional)</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                    name="image" accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Update Kategori</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection