@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h3 class="fw-bold mb-4">Detail Panti Asuhan</h3>
    <div class="card p-4 rounded-4 shadow-sm">
        <h5 class="fw-bold mb-2">{{ $orphanage->name }}</h5>
        <div class="mb-2"><strong>Slug:</strong> {{ $orphanage->slug }}</div>
        <div class="mb-2"><strong>Alamat:</strong> {{ $orphanage->address }}</div>
        <div class="mb-2"><strong>No. Telepon:</strong> {{ $orphanage->phone }}</div>
        <div class="mb-2"><strong>Email:</strong> {{ $orphanage->email }}</div>
        <div class="mb-2"><strong>Deskripsi:</strong> {{ $orphanage->description }}</div>
        <a href="{{ route('admin.orphanages.edit', $orphanage) }}" class="btn btn-primary rounded-pill px-4 mt-3">Edit</a>
        <a href="{{ route('admin.orphanages.index') }}" class="btn btn-secondary rounded-pill px-4 mt-3 ms-2">Kembali</a>
    </div>
</div>
@endsection 