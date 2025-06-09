@extends('layouts.app')

@section('content')
<div class="container py-5 text-center">
    <h2>Proses Pembayaran</h2>
    <p>Terima kasih, {{ $donation->name }}! Klik tombol di bawah untuk menyelesaikan donasi.</p>
    <button id="pay-button" class="btn btn-success">Bayar Sekarang</button>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="YOUR_CLIENT_KEY"></script>
<script>
    document.getElementById('pay-button').onclick = function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                alert("Pembayaran berhasil!");
                console.log(result);
            },
            onPending: function(result) {
                alert("Menunggu pembayaran.");
                console.log(result);
            },
            onError: function(result) {
                alert("Terjadi kesalahan.");
                console.log(result);
            }
        });
    };
</script>
@endsection
