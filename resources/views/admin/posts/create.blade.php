@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h3 class="fw-bold mb-4">Tambah Postingan</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->has('error'))
        <div class="alert alert-danger">{{ $errors->first('error') }}</div>
    @endif
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Gambar</label>
            <input type="file" name="image" class="form-control rounded-4 custom-input" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Judul</label>
            <input type="text" name="title" class="form-control rounded-4 custom-input" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Target Donasi (Rp)</label>
            <input type="number" name="target" class="form-control rounded-4 custom-input" min="1000" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Waktu Donasi Berakhir</label>
            <input type="date" name="batas_waktu" class="form-control rounded-4 custom-input" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Panti Asuhan</label>
            <select name="orphanage_id" class="form-control rounded-4 custom-input" required>
                <option value="">-- Pilih Panti Asuhan --</option>
                @foreach(\App\Models\Orphanage::all() as $orphanage)
                    <option value="{{ $orphanage->id }}">{{ $orphanage->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Konten</label>
            <textarea name="content" rows="6" class="form-control rounded-4 custom-input" required></textarea>
        </div>
        <button type="submit" class="btn btn-success rounded-pill px-4">Simpan</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary rounded-pill px-4 ms-2">Batal</a>
    </form>
</div>
<style>
    .custom-input { background:#f8faff; border:1px solid #e0e6ed; }
    .custom-input:focus { border-color:#0d6efd; background:#fff; box-shadow:0 0 0 2px #e3f0ff; }
</style>
@endsection 