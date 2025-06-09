@extends('layouts.app')

@section('content')
<style>
    .profile-container {
        max-width: 700px;
        margin: auto;
        background: #ffffff;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        font-family: 'Segoe UI', sans-serif;
    }

    .profile-container h4 {
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 1rem;
        transition: border 0.3s;
    }

    .form-control:focus {
        border-color: #007bff;
        outline: none;
    }

    .btn-custom {
        padding: 0.6rem 1.2rem;
        border: none;
        border-radius: 6px;
        background-color: #007bff;
        color: white;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn-custom:hover {
        background-color: #0056b3;
    }

    .btn-link {
        text-decoration: none;
        font-size: 0.9rem;
        color: #007bff;
    }

    .badge {
        display: inline-block;
        padding: 0.3rem 0.7rem;
        border-radius: 999px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .badge-success {
        background-color: #28a745;
        color: white;
    }

    .badge-danger {
        background-color: #dc3545;
        color: white;
    }

    .section-title {
        font-size: 1.1rem;
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-weight: bold;
    }

    .alert {
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }

    .alert-warning {
        background-color: #fff3cd;
        color: #856404;
    }

    img.profile-photo {
        border-radius: 50%;
        width: 100px;
        margin-bottom: 1rem;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group-full {
        grid-column: 1 / -1;
    }

    @media (max-width: 768px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="profile-container">
    <h4>Edit Profil</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-grid">
        {{-- Foto --}}
        <div class="form-group form-group-full">
            <label class="form-label">Foto Profil</label>
            <img src="{{ $user->foto ? asset('storage/' . $user->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}" class="profile-photo">
            <input type="file" class="form-control" name="foto">
        </div>

        {{-- Nama (readonly) --}}
        <div class="form-group">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
        </div>

        {{-- Tanggal Lahir --}}
        <div class="form-group">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $user->tanggal_lahir }}">
        </div>

        {{-- No HP --}}
        <div class="form-group">
            <label class="form-label">No. HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $user->no_hp }}">
        </div>

        {{-- Alamat --}}
        <div class="form-group form-group-full">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3">{{ $user->alamat }}</textarea>
        </div>
    </div>

    <br>
    <button type="submit" class="btn-custom mt-3">Simpan Perubahan</button>
</form>

</div>
@endsection
