@extends('layouts.app')

@section('content')
  <h2 class="mb-4">Daftar Panti Asuhan</h2>

  @foreach ($orphanages as $orphanage)
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">{{ $orphanage->name }}</h5>
        <p class="card-text">{{ $orphanage->address }}</p>
        <p class="card-text"><small class="text-muted">{{ $orphanage->description }}</small></p>
      </div>
    </div>
  @endforeach
@endsection
