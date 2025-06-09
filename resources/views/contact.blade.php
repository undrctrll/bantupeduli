@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-center">Kontak Kami</h2>
    <div class="row justify-content-center mb-5">
        <div class="col-md-6">
            <div class="p-4 rounded-4 shadow-sm bg-white">
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama</label>
                        <input type="text" name="name" class="form-control custom-input" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control custom-input" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pesan</label>
                        <textarea name="message" rows="4" class="form-control custom-input" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-semibold">Kirim Pesan</button>
                </form>
            </div>
        </div>
        <div class="col-md-5 mt-4 mt-md-0">
            <div class="p-4 rounded-4 shadow-sm bg-white h-100">
                <h5 class="fw-bold mb-3">Info Kontak</h5>
                <p class="mb-2"><i class="bi bi-envelope-fill me-2"></i> admin@bantupeduli.id</p>
                <p class="mb-2"><i class="bi bi-telephone-fill me-2"></i> +62 812 2525 1451</p>
                <p class="mb-0"><i class="bi bi-geo-alt-fill me-2"></i> Jl. Karang Suci No.19, Cilacap Tengah, Jawa Tengah</p>
            </div>
        </div>
    </div>
</div>
<style>
    .custom-input {
        border-radius: 10px;
        background: #f8faff;
        border: 1px solid #e0e6ed;
        transition: border 0.2s;
    }
    .custom-input:focus {
        border-color: #0d6efd;
        background: #fff;
        box-shadow: 0 0 0 2px #e3f0ff;
    }
</style>
@endsection
