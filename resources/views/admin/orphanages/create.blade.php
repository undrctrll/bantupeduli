@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h3 class="fw-bold mb-4">Tambah Panti Asuhan</h3>
    <form action="{{ route('admin.orphanages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Foto Profil</label>
            <input type="file" name="photo" class="form-control rounded-4 custom-input" accept="image/*" onchange="previewImage(event)">
            <img id="preview" src="#" alt="Preview" class="mt-2 rounded-4" style="max-width: 200px; display: none;" />
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Nama</label>
            <input type="text" name="name" class="form-control rounded-4 custom-input" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Slug</label>
            <input type="text" name="slug" class="form-control rounded-4 custom-input" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Alamat</label>
            <textarea name="address" class="form-control rounded-4 custom-input" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">No. Telepon</label>
            <input type="text" name="phone" class="form-control rounded-4 custom-input">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Email</label>
            <input type="email" name="email" class="form-control rounded-4 custom-input">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi</label>
            <textarea name="description" class="form-control rounded-4 custom-input"></textarea>
        </div>
        <input type="hidden" name="created_by" value="{{ auth()->id() }}">
        <button type="submit" class="btn btn-success rounded-pill px-4">Simpan</button>
        <a href="{{ route('admin.orphanages.index') }}" class="btn btn-secondary rounded-pill px-4 ms-2">Batal</a>
    </form>
</div>
@endsection
@push('scripts')
<script>
function previewImage(event) {
    const [file] = event.target.files;
    if (file) {
        const preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    }
}
</script>
@endpush 