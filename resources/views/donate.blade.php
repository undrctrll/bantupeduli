@extends('layouts.app')

@section('content')
  <h2 class="mb-4">Form Donasi</h2>

  <form action="{{ route('donations.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nama</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="amount" class="form-label">Jumlah Donasi (Rp)</label>
      <input type="number" name="amount" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="message" class="form-label">Pesan</label>
      <textarea name="message" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Kirim Donasi</button>
  </form>
@endsection
