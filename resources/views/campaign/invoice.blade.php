@extends('layouts.app')
@section('content')
<style>
.invoice-paper {
    background: #fff;
    max-width: 420px;
    margin: 48px auto 0 auto;
    padding: 0 0 32px 0;
    border-radius: 16px;
    box-shadow: 0 6px 32px rgba(13, 71, 161, 0.10), 0 1.5px 4px rgba(13, 71, 161, 0.08);
    border: 1.5px solid #e3e8f0;
    font-family: 'Segoe UI', Arial, sans-serif;
    overflow: hidden;
}
.invoice-header {
    background: #0d47a1;
    color: #fff;
    padding: 28px 32px 18px 32px;
    text-align: center;
}
.invoice-header .logo {
    font-weight: 700;
    font-size: 1.3rem;
    letter-spacing: 1px;
    margin-bottom: 6px;
}
.invoice-header .inv-title {
    font-size: 1.1rem;
    font-weight: 500;
    margin-bottom: 0;
}
.invoice-line {
    border-bottom: 1.5px dashed #e3e8f0;
    margin: 0 32px 24px 32px;
}
.invoice-section {
    padding: 0 32px;
    margin-bottom: 18px;
}
.invoice-label {
    color: #7b8ca7;
    font-size: 0.97rem;
    margin-bottom: 2px;
}
.invoice-value {
    font-size: 1.13rem;
    font-weight: 600;
    color: #222;
    margin-bottom: 0;
}
.invoice-id-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    margin-bottom: 8px;
}
.invoice-date {
    color: #7b8ca7;
    font-size: 0.95rem;
    text-align: right;
}
.btn-invoice {
    display: block;
    width: 100%;
    margin: 32px auto 0 auto;
    background: #0d47a1;
    color: #fff;
    border: none;
    padding: 12px 0;
    border-radius: 7px;
    font-size: 1.08rem;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s;
    box-shadow: 0 2px 8px rgba(13, 71, 161, 0.08);
}
.btn-invoice:hover {
    background: #08306b;
}
.invoice-footer {
    margin-top: 32px;
    font-size: 0.97rem;
    color: #7b8ca7;
    text-align: center;
    padding: 0 32px;
}
@media (max-width: 600px) {
    .invoice-paper, .invoice-header, .invoice-section, .invoice-line, .invoice-footer {
        padding-left: 12px !important;
        padding-right: 12px !important;
        margin-left: 0 !important;
        margin-right: 0 !important;
    }
}
</style>
<div class="invoice-paper">
    <div class="invoice-header">
        <div class="logo">Bantu Peduli</div>
        <div class="inv-title">INVOICE DONASI</div>
    </div>
    <div class="invoice-line"></div>
    <div class="invoice-section">
        <div class="invoice-label">Nama Donatur</div>
        <div class="invoice-value">{{ $donasi->nama }}</div>
    </div>
    <div class="invoice-section">
        <div class="invoice-label">Nominal Donasi</div>
        <div class="invoice-value">Rp{{ number_format($donasi->jumlah,0,',','.') }}</div>
    </div>
    <div class="invoice-section invoice-id-row">
        <div>
            <div class="invoice-label">ID Transaksi</div>
            <div class="invoice-value">{{ $donasi->order_id }}</div>
        </div>
        <div class="invoice-date">
            {{ \Carbon\Carbon::parse($donasi->created_at)->format('d M Y') }}
        </div>
    </div>
    <div class="invoice-section">
        <div id="snap-container"></div>
        <div id="notif-status" class="my-3"></div>
        <button id="cek-status" class="btn-invoice">Cek Pembayaran</button>
    </div>
    <div class="invoice-footer">Terima kasih atas donasi Anda!<br>Semoga menjadi amal jariyah dan membawa keberkahan.</div>
</div>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
window.onload = function() {
    snap.pay("{{ $donasi->snap_token }}", {
        "onClose": function() {},
        "onSuccess": function(result) {},
        "onPending": function(result) {},
        "onError": function(result) {}
    });
};

document.getElementById('cek-status').onclick = function () {
    fetch("{{ route('campaign.donate.check', $donasi->order_id) }}")
        .then(res => res.json())
        .then(data => {
            let notif = document.getElementById('notif-status');
            if(data.status === 'settlement' || data.status === 'capture') {
                notif.innerHTML = '<div class="alert alert-success">Pembayaran telah berhasil!</div>';
            } else {
                notif.innerHTML = '<div class="alert alert-warning">Pembayaran belum berhasil.</div>';
            }
        });
};
</script>
@endsection
