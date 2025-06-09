@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow rounded-4 overflow-hidden mb-4">
                <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://paybill.id/cfd/upload/banner-program/compress/paybill-program-banner-1-WCNTXI-1715940733994.png' }}" class="w-100" style="max-height:350px;object-fit:cover;">
                <div class="card-body p-4">
                    <h2 class="fw-bold mb-2">{{ $post->title }}</h2>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="fw-semibold">Rp {{ number_format($post->total_donasi,0,',','.') }}</span>
                            <span class="fw-semibold">dari Rp {{ number_format($post->target,0,',','.') }}</span>
                        </div>
                        <div class="progress" style="height:11px;">
                            <div class="progress-bar" style="width: {{ $post->target > 0 ? min(100, round(($post->total_donasi / $post->target) * 100, 2)) : 0 }}%; background-color: #0d47a1;"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-1 small">
                            <span>{{ $post->donations->count() }} Donasi</span>
                            <span>
                                @php
                                    $daysLeft = $post->batas_waktu ? (int) \Carbon\Carbon::now()->diffInDays($post->batas_waktu, false) : null;
                                @endphp
                                @if($daysLeft !== null)
                                    @if($daysLeft > 0)
                                        {{ $daysLeft }} hari lagi
                                    @else
                                        Berakhir
                                    @endif
                                @else
                                    -
                                @endif
                            </span>
                        </div>
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
                    <a href="{{ route('campaign.donate.form', $post->slug) }}" class="btn btn-success rounded-pill px-4 mb-3">Donasi Sekarang</a>
                    <div class="mb-3">
                        <h5 class="fw-bold">Deskripsi Campaign</h5>
                        <div>{{ $post->content }}</div>
                    </div>
                </div>
            </div>
            <div class="card shadow rounded-4 mb-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Penggalang Dana</h5>
                    @foreach($fundraisers as $f)
                        <div class="mb-2">
                            <strong>{{ $f['name'] }}</strong> <span class="text-muted small">(Berhasil mengajak {{ $f['count'] }} orang, Rp {{ number_format($f['total'],0,',','.') }})</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card shadow rounded-4 mb-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Doa & Komentar</h5>
                    @foreach($comments as $c)
                        <div class="mb-3">
                            <div class="fw-semibold">{{ $c['name'] }}</div>
                            <div class="small text-muted">{{ $c['date'] }}</div>
                            <div>{{ $c['message'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 