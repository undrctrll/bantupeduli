@extends('layouts.app')
@section('content')
<div class="container py-4">
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
            <div class="bg-white rounded-4 shadow-sm p-4 mb-4">
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
                    <h3 class="fw-bold mb-0">Kelola Panti Asuhan</h3>
                    <a href="{{ route('admin.orphanages.create') }}" class="btn btn-success rounded-pill px-4">+ Tambah Panti Asuhan</a>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="table-responsive rounded-4">
                    <table class="table align-middle mb-0 table-hover table-striped">
                        <thead class="bg-light">
                            <tr>
                                <th class="fw-semibold">#</th>
                                <th class="fw-semibold">Nama</th>
                                <th class="fw-semibold">Alamat</th>
                                <th class="fw-semibold">Email</th>
                                <th class="fw-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orphanages as $orphanage)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $orphanage->name }}</td>
                                <td>{{ $orphanage->address }}</td>
                                <td>{{ $orphanage->email }}</td>
                                <td>
                                    <div class="d-flex flex-nowrap gap-2">
                                        <a href="{{ route('admin.orphanages.edit', $orphanage) }}" class="btn btn-primary btn-sm rounded-pill">Edit</a>
                                        <form action="{{ route('admin.orphanages.destroy', $orphanage) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus panti asuhan?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm rounded-pill">Hapus</button>
                                        </form>
                                        <a href="{{ route('admin.orphanages.show', $orphanage) }}" class="btn btn-info btn-sm rounded-pill">Detail</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{ $orphanages->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .admin-sidebar { background: #f8faff; }
    .admin-menu-link { display:block; padding:10px 0; color:#333; font-weight:500; border-radius:8px; transition:background 0.2s; text-decoration:none; }
    .admin-menu-link:hover, .admin-menu-link.active { background:#e3f0ff; color:#0d6efd; text-decoration:none; }
    .table thead th { border-bottom: 2px solid #e3e3e3; }
    .table-striped > tbody > tr:nth-of-type(odd) { background-color: #f8faff; }
    .table td, .table th { vertical-align: middle; }
</style>
@endsection 