@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="bg-white rounded-4 shadow-sm p-4 h-100 admin-sidebar">
                <h5 class="fw-bold mb-4">Menu Admin</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ route('admin.dashboard') }}" class="admin-menu-link d-flex align-items-center gap-2">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('admin.posts.index') }}" class="admin-menu-link d-flex align-items-center gap-2">
                            <i class="bi bi-file-earmark-text"></i> Kelola Postingan
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('admin.orphanages.index') }}" class="admin-menu-link d-flex align-items-center gap-2">
                            <i class="bi bi-house-heart"></i> Kelola Panti Asuhan
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('admin.users.index') }}" class="admin-menu-link d-flex align-items-center gap-2">
                            <i class="bi bi-people"></i> Kelola User
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="bg-white rounded-4 shadow-sm p-4">
                <h3 class="fw-bold mb-3"><span id="greeting"></span>, Admin!</h3>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="stat-card rounded-4 p-4 text-center">
                            <div class="stat-icon mb-2"><i class="bi bi-file-earmark-text text-primary" style="font-size:2rem;"></i></div>
                            <div class="fw-bold fs-4">{{ \App\Models\Post::count() }}</div>
                            <div class="text-muted">Total Postingan</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card rounded-4 p-4 text-center">
                            <div class="stat-icon mb-2"><i class="bi bi-people text-success" style="font-size:2rem;"></i></div>
                            <div class="fw-bold fs-4">{{ \App\Models\User::count() }}</div>
                            <div class="text-muted">Total User</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card rounded-4 p-4 text-center">
                            <div class="stat-icon mb-2"><i class="bi bi-cash-coin text-warning" style="font-size:2rem;"></i></div>
                            <div class="fw-bold fs-4">Rp {{ number_format(\App\Models\Donation::sum('jumlah'),0,',','.') }}</div>
                            <div class="text-muted">Total Donasi</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4 mt-4">
                <div class="col-12">
                    <div class="bg-white rounded-4 shadow-sm p-4">
                        <h5 class="fw-bold mb-3">Grafik Total Donasi per Bulan</h5>
                        <canvas id="donasiChart" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .admin-sidebar { background: #f8faff; }
    .admin-menu-link { display:block; padding:10px 0; color:#333; font-weight:500; border-radius:8px; transition:background 0.2s; text-decoration:none; }
    .admin-menu-link:hover, .admin-menu-link.active { background:#e3f0ff; color:#0d6efd; text-decoration:none; }
    .stat-card { background:#f8faff; box-shadow:0 2px 12px rgba(0,0,0,0.04); }
</style>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function getGreeting() {
        const hour = new Date().getHours();
        if (hour >= 5 && hour < 11) return 'Selamat Pagi ⛅';
        if (hour >= 11 && hour < 15) return 'Selamat Siang 🌞';
        if (hour >= 15 && hour < 18) return 'Selamat Sore ☀️';
        return 'Selamat Malam 🌜';
    }
    document.getElementById('greeting').innerText = getGreeting();

fetch('/admin/donasi-chart-data')
    .then(res => res.json())
    .then(data => {
        const ctx = document.getElementById('donasiChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Total Donasi (Rp)',
                    data: data.totals,
                    backgroundColor: '#0d47a1',
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        });
    });
</script>
@endpush
@push('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
@endpush
@endsection 