@extends('layouts.app')
@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-center">Galeri Kegiatan</h2>
    <div class="row g-3 justify-content-center">
        @php
            $galeri = [
                'https://images.unsplash.com/photo-1506744038136-46273834b3fb',
                'https://images.unsplash.com/photo-1465101046530-73398c7f28ca',
                'https://images.unsplash.com/photo-1519125323398-675f0ddb6308',
                'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e',
                'https://images.unsplash.com/photo-1516979187457-637abb4f9353',
                'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429',
            ];
        @endphp
        @foreach($galeri as $img)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="gallery-card rounded-4 overflow-hidden shadow-sm mb-2">
                <img src="{{ $img }}" class="w-100 h-100 gallery-img" style="object-fit:cover; min-height:180px; max-height:200px; transition:transform 0.3s;" alt="Galeri">
            </div>
        </div>
        @endforeach
    </div>
</div>
<style>
    .gallery-card {
        background: #f8faff;
        transition: box-shadow 0.2s, transform 0.2s;
    }
    .gallery-card:hover .gallery-img {
        transform: scale(1.08) rotate(-2deg);
    }
</style>
@endsection 