@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h3 class="fw-bold mb-4">Edit Panti Asuhan</h3>
    <form action="{{ route('admin.orphanages.update', $orphanage) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Foto Profil</label>
            <input type="file" name="photo" class="form-control rounded-4 custom-input" accept="image/*" onchange="previewImage(event)">
            <img id="preview" src="{{ $orphanage->logo ? asset('storage/' . $orphanage->logo) : '#' }}" alt="Preview" class="mt-2 rounded-4" style="max-width: 200px; {{ $orphanage->logo ? '' : 'display:none;' }}" />
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Nama</label>
            <input type="text" name="name" class="form-control rounded-4 custom-input" value="{{ $orphanage->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Slug</label>
            <input type="text" name="slug" class="form-control rounded-4 custom-input" value="{{ $orphanage->slug }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Alamat</label>
            <textarea name="address" class="form-control rounded-4 custom-input" required>{{ $orphanage->address }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">No. Telepon</label>
            <input type="text" name="phone" class="form-control rounded-4 custom-input" value="{{ $orphanage->phone }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Email</label>
            <input type="email" name="email" class="form-control rounded-4 custom-input" value="{{ $orphanage->email }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi</label>
            <textarea name="description" class="form-control rounded-4 custom-input">{{ $orphanage->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill px-4">Update</button>
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