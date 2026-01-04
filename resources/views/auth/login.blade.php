<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Percetakan & ATK</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            width: 100%;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
        }

        .login-card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            background: white;
        }

        .card-header {
            background: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 2rem 2rem 1.5rem 2rem;
            border-bottom: none;
        }

        .brand-logo {
            font-size: 3rem;
            text-align: center;
            margin-bottom: 1rem;
        }

        .card-body {
            padding: 1.5rem 2rem 2rem 2rem;
        }

        .card-footer {
            padding: 1rem 2rem;
            background-color: white;
            border-radius: 0 0 15px 15px;
            border-top: 1px solid #e9ecef;
        }

        .form-control-lg {
            padding: 0.75rem 1rem;
            font-size: 1rem;
        }

        .btn-lg {
            padding: 0.75rem;
            font-size: 1.1rem;
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 576px) {

            .card-header,
            .card-body {
                padding: 1.5rem;
            }

            .brand-logo {
                font-size: 2.5rem;
            }

            .card-header h3 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="card login-card">
            <div class="card-header">
                <div class="brand-logo">🖨️</div>
                <h3 class="text-center mb-2">Percetakan & ATK</h3>
                <p class="text-center text-muted mb-0">Silakan login untuk melanjutkan</p>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        @foreach($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ old('email') }}" required autofocus
                            placeholder="nama@email.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror" id="password"
                            name="password" required placeholder="Masukkan password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            Ingat Saya
                        </label>
                    </div>

                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Login
                        </button>
                    </div>

                    <!-- <div class="text-center">
                        <p class="mb-0">Belum punya akun?
                            <a href="{{ route('register') }}" class="text-decoration-none fw-bold">Daftar disini</a>
                        </p>
                    </div> -->
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="/" class="text-decoration-none">← Kembali ke Beranda</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>