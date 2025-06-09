@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h4 class="fw-semibold text-center mb-4">Yuk, Donasi Sekarang!</h4>
    <p class="text-center mb-5">Mereka butuh uluran tangan kita. Karena sedikit bantuan dari kita adalah harapan besar bagi mereka.</p>
    <div class="row justify-content-center">
        @forelse($posts as $post)
        <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
            <div class="card h-100 border-0 shadow rounded-4 overflow-hidden">
                <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://paybill.id/cfd/upload/banner-program/compress/paybill-program-banner-1-WCNTXI-1715940733994.png' }}"
                    class="card-img-top" style="height: 140px; object-fit: cover;" alt="{{ $post->title }}">

                <div class="card-body">
                    {{-- Judul --}}
                    <h5 class="fw-bold mb-2">{{ $post->title }}</h5>

                    {{-- Progress --}}
                    <div class="progress mb-2 position-relative" style="height: 11px;">
                        @php
                            $percent = $post->target > 0 ? min(100, round(($post->total_donasi / $post->target) * 100, 2)) : 0;
                        @endphp
                        <div class="progress-bar" role="progressbar" style="width: {{ $percent }}%; background-color: #0d47a1;"></div>
                        <!-- <span class="position-absolute top-0 start-50 translate-middle-x small text-dark" style="font-size:10px;line-height:6px;">{{ $percent }}%</span> -->
                    </div>

                    {{-- Donasi dan Hari --}}
                    <div class="d-flex justify-content-between text-muted small mb-2">
                        <div>
                            <strong>Rp {{ number_format($post->total_donasi,0,',','.') }}</strong><br>
                            <span>{{ $post->donations->count() }} Donasi</span>
                        </div>
                        <div class="text-end">
                        <strong>Batas Waktu</strong><br>
                            @if($post->batas_waktu)
                                <div class="small text-muted">s/d {{ \Carbon\Carbon::parse($post->batas_waktu)->translatedFormat('d M Y') }}</div>
                            @endif
                        </div>
                    </div>

                    {{-- Profil Panti --}}
                    <div class="d-flex align-items-center mt-3">
                        @if($post->orphanage && $post->orphanage->logo)
                            <img src="{{ asset('storage/' . $post->orphanage->logo) }}" alt="Logo" class="rounded-circle me-2" style="width: 30px; height: 30px; object-fit: cover;">
                        @else
                            <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px;">
                                {{ strtoupper(Str::substr($post->orphanage->name ?? 'P', 0, 2)) }}
                            </div>
                        @endif
                        <span class="small text-truncate" style="max-width: 200px;">{{ $post->orphanage->name ?? 'Lembaga Tidak Diketahui' }}</span>
                    </div>
                </div>

                <div class="card-footer bg-white border-0 text-end">
                    <a href="{{ route('campaign.show', $post->slug) }}" class="btn btn-outline-primary btn-sm rounded-pill">Lihat Detail</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <p class="text-muted">Belum ada kampanye donasi yang tersedia.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
