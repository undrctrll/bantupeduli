@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f5f7fa;
        font-family: 'Poppins', sans-serif;
    }

    .login-card {
        max-width: 450px;
        margin: 60px auto;
        padding: 40px 30px;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .login-card h3 {
        font-weight: 600;
        margin-bottom: 30px;
        text-align: center;
        color: #1d3557;
    }

    .form-control {
        border-radius: 12px;
        border: 1px solid #ced4da;
        font-size: 15px;
        padding: 12px;
        background-color: #f9f9f9;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #457b9d;
        background-color: #fff;
    }

    .btn-custom {
        background-color: #1d3557;
        color: #fff;
        padding: 10px 20px;
        border-radius: 12px;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #457b9d;
    }

    .form-check-label {
        font-size: 14px;
    }

    .forgot-link {
        font-size: 14px;
        margin-top: 10px;
        display: inline-block;
    }
</style>

<div class="container">
    <div class="login-card">
        <h3>Login ke Akun Anda</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="current-password">
                @error('password')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember"
                       {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Ingat Saya</label>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-custom">Login</button>
            </div>

            @if (Route::has('password.request'))
                <a class="forgot-link text-decoration-none" href="{{ route('password.request') }}">
                    Lupa kata sandi?
                </a>
            @endif
        </form>
    </div>
</div>
@endsection
