@extends('layouts.app')
@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-center">Tentang Kami</h2>
    <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center">
            <p class="lead">Bantu Peduli adalah platform donasi yang berfokus membantu anak-anak panti asuhan untuk masa depan yang lebih cerah. Kami percaya setiap anak berhak mendapatkan kesempatan yang sama untuk tumbuh dan berkembang.</p>
        </div>
    </div>
    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="p-4 rounded-4 shadow-sm h-100 bg-white">
                <h5 class="fw-bold mb-2"><i class="bi bi-bullseye text-primary me-2"></i> Visi</h5>
                <p class="mb-0">Menjadi jembatan kebaikan bagi anak-anak panti asuhan di seluruh Indonesia.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-4 rounded-4 shadow-sm h-100 bg-white">
                <h5 class="fw-bold mb-2"><i class="bi bi-flag text-success me-2"></i> Misi</h5>
                <ul class="mb-0 ps-3">
                    <li>Menggalang dana dan bantuan secara transparan.</li>
                    <li>Memberikan edukasi dan dukungan berkelanjutan.</li>
                    <li>Membangun jaringan relawan dan donatur.</li>
                </ul>
            </div>
        </div>
    </div>
    <h4 class="fw-bold mb-4 text-center">Tim Kami</h4>
    <div class="row g-4 justify-content-center">
        @php
            $team = [
                ['name' => 'Rasya', 'role' => 'Founder', 'img' => 'https://ui-avatars.com/api/?name=Rasya'],
                ['name' => 'Putri', 'role' => 'Co-Founder', 'img' => 'https://ui-avatars.com/api/?name=Putri'],
                ['name' => 'Rasya', 'role' => 'Developer', 'img' => 'https://ui-avatars.com/api/?name=Budi'],
            ];
        @endphp
        @foreach($team as $member)
        <div class="col-md-3 col-6">
            <div class="text-center p-3 rounded-4 shadow-sm bg-white h-100">
                <img src="{{ $member['img'] }}" class="rounded-circle mb-2" width="70" height="70" alt="{{ $member['name'] }}">
                <h6 class="fw-semibold mb-0">{{ $member['name'] }}</h6>
                <small class="text-muted">{{ $member['role'] }}</small>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection 