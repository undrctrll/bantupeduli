@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f5f7fa;
        font-family: 'Poppins', sans-serif;
    }

    .register-card {
        max-width: 500px;
        margin: 60px auto;
        padding: 40px 30px;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

    .register-card h3 {
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

    .invalid-feedback {
        font-size: 14px;
    }
</style>

<div class="container">
    <div class="register-card">
        <h3>Buat Akun Baru</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input id="name" type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email">
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
                       name="password" required autocomplete="new-password">
                @error('password')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password-confirm" class="form-label">Konfirmasi Kata Sandi</label>
                <input id="password-confirm" type="password"
                       class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-custom">Daftar</button>
            </div>
        </form>
    </div>
</div>
@endsection
