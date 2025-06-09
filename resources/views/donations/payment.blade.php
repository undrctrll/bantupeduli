@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <h4>Terima kasih {{ $donation->name }}!</h4>
    <p>Silakan lanjutkan pembayaran dengan mengklik tombol di bawah.</p>
    <button id="pay-button" class="btn btn-primary mt-3">Bayar Sekarang</button>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
document.getElementById('pay-button').addEventListener('click', function () {
    snap.pay('{{ $snapToken }}');
});
</script>
@endsection
