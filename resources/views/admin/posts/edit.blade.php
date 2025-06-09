@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h3 class="fw-bold mb-4">Edit Postingan</h3>
    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Judul</label>
            <input type="text" name="title" class="form-control rounded-4 custom-input" value="{{ $post->title }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Konten</label>
            <textarea name="content" rows="6" class="form-control rounded-4 custom-input" required>{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Panti Asuhan</label>
            <select name="orphanage_id" class="form-control rounded-4 custom-input" required>
                <option value="">-- Pilih Panti Asuhan --</option>
                @foreach(\App\Models\Orphanage::all() as $orphanage)
                    <option value="{{ $orphanage->id }}" {{ $post->orphanage_id == $orphanage->id ? 'selected' : '' }}>{{ $orphanage->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill px-4">Update</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary rounded-pill px-4 ms-2">Batal</a>
    </form>
</div>
<style>
    .custom-input { background:#f8faff; border:1px solid #e0e6ed; }
    .custom-input:focus { border-color:#0d6efd; background:#fff; box-shadow:0 0 0 2px #e3f0ff; }
</style>
@endsection 