@extends('layouts.app')
@section('content')
<style>
    .donasi-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 2px 16px rgba(0,0,0,0.07);
        padding: 2rem 2rem 1.5rem 2rem;
        max-width: 480px;
        margin: 2rem auto;
    }
    .donasi-nominal-btn {
        border-radius: 12px;
        background: #f8faff;
        border: 1.5px solid #e0e6ed;
        font-weight: 600;
        color: #333;
        min-width: 110px;
        margin-bottom: 8px;
        transition: all 0.2s;
    }
    .donasi-nominal-btn.active, .donasi-nominal-btn:focus {
        background: #e3f0ff;
        color: #0d6efd;
        border-color: #0d6efd;
    }
    .donasi-sapaan-btn {
        border-radius: 8px;
        background: #f8faff;
        border: 1.5px solid #e0e6ed;
        font-weight: 500;
        color: #333;
        min-width: 70px;
        margin-right: 8px;
        margin-bottom: 8px;
        transition: all 0.2s;
    }
    .donasi-sapaan-btn.active, .donasi-sapaan-btn:focus {
        background: #0d6efd;
        color: #fff;
        border-color: #0d6efd;
    }
    .donasi-label {
        font-weight: 600;
        margin-bottom: 6px;
    }
    .donasi-input {
        border-radius: 10px;
        background: #f8faff;
        border: 1.5px solid #e0e6ed;
        margin-bottom: 12px;
    }
    .donasi-toggle {
        accent-color: #0d6efd;
    }
    .donasi-btn-main {
        background: #0d6efd;
        color: #fff;
        font-weight: 600;
        border-radius: 12px;
        font-size: 1.1rem;
        padding: 0.8rem 0;
        margin-top: 10px;
    }
    .donasi-metode-box {
        border: 1.5px solid #e0e6ed;
        border-radius: 12px;
        background: #f8faff;
        padding: 12px 16px;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
    }
    .donasi-metode-logo {
        height: 32px;
        width: 60px;
        object-fit: contain;
        background: #fff;
        border-radius: 6px;
        border: 1px solid #e0e6ed;
        padding: 2px 6px;
    }
    .modal-metode .modal-body {
        max-height: 350px;
        overflow-y: auto;
    }
    .metode-list-group .list-group-item {
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 12px;
        border: none;
        border-radius: 8px;
        margin-bottom: 4px;
        transition: background 0.15s;
    }
    .metode-list-group .list-group-item.active, .metode-list-group .list-group-item:hover {
        background: #e3f0ff;
    }
    .metode-bank-logo {
        width: 32px;
        height: 32px;
        object-fit: contain;
        background: #fff;
        border-radius: 6px;
        border: 1px solid #e0e6ed;
        padding: 2px 4px;
    }
</style>
<div class="container" style="background:#f3f6fa;min-height:100vh;">
    <div class="donasi-card">
        <div class="mb-3 d-flex align-items-center gap-3">
            <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://paybill.id/cfd/upload/banner-program/compress/paybill-program-banner-1-WCNTXI-1715940733994.png' }}" style="width:80px;height:60px;object-fit:cover;border-radius:10px;">
            <div>
                <div class="small text-muted">Anda akan berdonasi dalam program:</div>
                <div class="fw-bold" style="font-size:1.1rem;">{{ $post->title }}</div>
            </div>
        </div>
        <form action="{{ route('campaign.donate.store', $post->slug) }}" method="POST">
            @csrf
            <div class="mb-3">
                <div class="donasi-label">Donasi Terbaik Anda</div>
                <div class="d-flex flex-wrap gap-2 mb-2">
                    @foreach([10000, 30000, 50000, 100000] as $nom)
                        <button type="button" class="btn donasi-nominal-btn" data-nominal="{{ $nom }}">Rp {{ number_format($nom,0,',','.') }}</button>
                    @endforeach
                    <button type="button" class="btn donasi-nominal-btn" data-nominal="other">Nominal<br><span class="small text-muted">lainnya</span></button>
                </div>
                <input type="number" name="nominal" id="nominal" class="form-control donasi-input" placeholder="Nominal lain..." min="10000" required>
            </div>
            <div class="mb-3">
                <div class="donasi-label">Metode Pembayaran</div>
                <div class="donasi-metode-box" data-bs-toggle="modal" data-bs-target="#modalMetode">
                    <img id="metode-logo" src="https://upload.wikimedia.org/wikipedia/commons/e/e0/QRIS_Logo.svg" class="donasi-metode-logo" alt="QRIS">
                    <span id="metode-label" class="fw-semibold">QRIS</span>
                    <span class="ms-auto text-primary">Pilih <i class="bi bi-chevron-right"></i></span>
                </div>
                <input type="hidden" name="metode" id="metode" value="qris">
            </div>
            <div class="mb-3">
                <div class="donasi-label">Sapaan :</div>
                <div class="d-flex mb-2">
                    @foreach(['Bapak','Ibu','Kak'] as $sapaan)
                        <button type="button" class="btn donasi-sapaan-btn" data-sapaan="{{ $sapaan }}">{{ $sapaan }}</button>
                    @endforeach
                </div>
                <input type="hidden" name="sapaan" id="sapaan" value="Bapak">
            </div>
            <div class="mb-2">
                <input type="text" name="nama" class="form-control donasi-input" placeholder="Nama Lengkap">
            </div>
            <div class="mb-2">
                <div class="form-check">
                    <input class="form-check-input donasi-toggle" type="checkbox" name="sembunyikan_nama" value="1" id="sembunyikan_nama">
                    <label class="form-check-label" for="sembunyikan_nama">Sembunyikan nama saya (Hamba Allah)</label>
                </div>
            </div>
            <div class="mb-2">
                <input type="text" name="nomor_hp" class="form-control donasi-input" placeholder="No Whatsapp atau Handphone">
            </div>
            <div class="mb-2">
                <input type="email" name="email" class="form-control donasi-input" placeholder="Email (optional)">
            </div>
            <div class="mb-2">
                <textarea name="pesan" class="form-control donasi-input" placeholder="Tuliskan pesan atau doa disini (optional)"></textarea>
            </div>
            <button type="submit" class="btn donasi-btn-main w-100">Donasi - Rp</button>
        </form>
    </div>

    <!-- Modal Metode Pembayaran -->
    <div class="modal fade modal-metode" id="modalMetode" tabindex="-1" aria-labelledby="modalMetodeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalMetodeLabel">Metode Pembayaran</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2 small fw-bold">Pembayaran Instan (Cepat & Mudah)</div>
                    <div class="list-group metode-list-group mb-3">
                        <div class="list-group-item" data-metode="gopay" data-label="Gopay" data-logo="https://assets.gojekapi.com/misc/icon_gopay.svg">
                            <img src="https://assets.gojekapi.com/misc/icon_gopay.svg" class="metode-bank-logo"> Gopay
                        </div>
                        <div class="list-group-item active" data-metode="qris" data-label="QRIS" data-logo="https://upload.wikimedia.org/wikipedia/commons/e/e0/QRIS_Logo.svg">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/QRIS_Logo.svg" class="metode-bank-logo"> QRIS
                        </div>
                    </div>
                    <div class="mb-2 small fw-bold">Virtual Account (Verifikasi Otomatis)</div>
                    <div class="list-group metode-list-group mb-3">
                        <div class="list-group-item" data-metode="va_bsi" data-label="VA Bank Syariah Indonesia" data-logo="https://upload.wikimedia.org/wikipedia/commons/a/a0/Bank_Syariah_Indonesia.svg">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a0/Bank_Syariah_Indonesia.svg" class="metode-bank-logo"> VA Bank Syariah Indonesia
                        </div>
                        <div class="list-group-item" data-metode="va_mandiri" data-label="VA Bank Mandiri" data-logo="https://upload.wikimedia.org/wikipedia/commons/0/0e/Bank_Mandiri_logo.svg">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/0/0e/Bank_Mandiri_logo.svg" class="metode-bank-logo"> VA Bank Mandiri
                        </div>
                        <div class="list-group-item" data-metode="va_bni" data-label="VA Bank BNI" data-logo="https://upload.wikimedia.org/wikipedia/commons/9/9e/Logo_Bank_BNI.png">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/9/9e/Logo_Bank_BNI.png" class="metode-bank-logo"> VA Bank BNI
                        </div>
                        <div class="list-group-item" data-metode="va_permata" data-label="VA Permata Bank" data-logo="https://upload.wikimedia.org/wikipedia/commons/6/6b/PermataBank_logo.svg">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/PermataBank_logo.svg" class="metode-bank-logo"> VA Permata Bank
                        </div>
                    </div>
                    <div class="mb-2 small fw-bold">Transfer Bank (Verifikasi Manual 1x24jam)</div>
                    <div class="list-group metode-list-group">
                        <div class="list-group-item" data-metode="transfer_bsi" data-label="Transfer Bank Syariah Indonesia" data-logo="https://upload.wikimedia.org/wikipedia/commons/a/a0/Bank_Syariah_Indonesia.svg">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a0/Bank_Syariah_Indonesia.svg" class="metode-bank-logo"> Transfer Bank Syariah Indonesia
                        </div>
                        <div class="list-group-item" data-metode="transfer_bni" data-label="Transfer Bank BNI" data-logo="https://upload.wikimedia.org/wikipedia/commons/9/9e/Logo_Bank_BNI.png">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/9/9e/Logo_Bank_BNI.png" class="metode-bank-logo"> Transfer Bank BNI
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    // Nominal button
    document.querySelectorAll('.donasi-nominal-btn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelectorAll('.donasi-nominal-btn').forEach(b=>b.classList.remove('active'));
            this.classList.add('active');
            if(this.getAttribute('data-nominal') === 'other') {
                document.getElementById('nominal').value = '';
                document.getElementById('nominal').focus();
            } else {
                document.getElementById('nominal').value = this.getAttribute('data-nominal');
            }
        });
    });
    // Sapaan button
    document.querySelectorAll('.donasi-sapaan-btn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelectorAll('.donasi-sapaan-btn').forEach(b=>b.classList.remove('active'));
            this.classList.add('active');
            document.getElementById('sapaan').value = this.getAttribute('data-sapaan');
        });
    });
    // Metode pembayaran modal
    document.querySelectorAll('.metode-list-group .list-group-item').forEach(function(item) {
        item.addEventListener('click', function() {
            document.querySelectorAll('.metode-list-group .list-group-item').forEach(b=>b.classList.remove('active'));
            this.classList.add('active');
            document.getElementById('metode').value = this.getAttribute('data-metode');
            document.getElementById('metode-label').innerText = this.getAttribute('data-label');
            document.getElementById('metode-logo').src = this.getAttribute('data-logo');
            var modal = bootstrap.Modal.getInstance(document.getElementById('modalMetode'));
            modal.hide();
        });
    });
</script>
@endpush
@endsection 