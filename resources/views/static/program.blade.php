@extends('layouts.app')
@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-center">Program Donasi</h2>
    <div class="row g-4 justify-content-center">
        @php
            $programs = [
                ['icon' => 'bi-people-fill', 'title' => 'Anak Asuh', 'desc' => 'Bantu biaya hidup dan pendidikan anak asuh di panti.'],
                ['icon' => 'bi-heart-pulse-fill', 'title' => 'Kesehatan', 'desc' => 'Dukung kebutuhan kesehatan dan pengobatan anak-anak.'],
                ['icon' => 'bi-book-fill', 'title' => 'Pendidikan', 'desc' => 'Sumbang buku, alat tulis, dan biaya sekolah.'],
                ['icon' => 'bi-bag-fill', 'title' => 'Pakaian & Kebutuhan', 'desc' => 'Berikan pakaian dan kebutuhan sehari-hari.'],
                ['icon' => 'bi-cup-straw', 'title' => 'Makanan & Nutrisi', 'desc' => 'Pastikan anak-anak mendapat makanan bergizi.'],
            ];
        @endphp
        @foreach($programs as $item)
        <div class="col-md-4 col-lg-3">
            <div class="card border-0 shadow rounded-4 h-100 text-center p-4 custom-card">
                <div class="mb-3">
                    <i class="bi {{ $item['icon'] }} text-primary" style="font-size:2.5rem;"></i>
                </div>
                <h5 class="fw-semibold mb-2">{{ $item['title'] }}</h5>
                <p class="text-muted small">{{ $item['desc'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
<style>
    .custom-card {
        background: #f8faff;
        transition: box-shadow 0.2s, transform 0.2s;
    }
    .custom-card:hover {
        box-shadow: 0 8px 32px rgba(0,0,0,0.10);
        transform: translateY(-4px) scale(1.03);
    }
</style>
@endsection 