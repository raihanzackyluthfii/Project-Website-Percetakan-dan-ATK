@extends('layouts.app')

@section('title', 'Home - Percetakan & ATK')

@section('content')
    <div class="container">
        <div class="jumbotron bg-light p-5 rounded">
            <h1 class="display-4">Selamat Datang di Percetakan & ATK</h1>
            <p class="lead">Solusi terbaik untuk kebutuhan percetakan dan alat tulis kantor Anda</p>
            <hr class="my-4">
            <p>Kami menyediakan berbagai produk berkualitas dengan harga terjangkau</p>
            @auth
                <a class="btn btn-primary btn-lg me-2" href="{{ route('dashboard') }}" role="button">Dashboard</a>
                <a class="btn btn-success btn-lg" href="{{ route('products.index') }}" role="button">Lihat Produk</a>
            @else
                <a class="btn btn-primary btn-lg me-2" href="{{ route('login') }}" role="button">Login</a>
                <!-- <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button">Daftar Sekarang</a> -->
            @endauth
        </div>

        <div class="row mt-5">
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h2 class="display-1">📦</h2>
                        <h5 class="card-title">Produk Berkualitas</h5>
                        <p class="card-text">Kami menyediakan produk ATK dan percetakan dengan kualitas terbaik</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h2 class="display-1">💰</h2>
                        <h5 class="card-title">Harga Terjangkau</h5>
                        <p class="card-text">Dapatkan harga terbaik dan kompetitif untuk semua produk</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h2 class="display-1">🚚</h2>
                        <h5 class="card-title">Pengiriman Cepat</h5>
                        <p class="card-text">Pesanan Anda akan diproses dan dikirim dengan cepat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection