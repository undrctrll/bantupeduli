<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Pembayaran Donasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 0;
        }

        .donation-container {
            max-width: 500px;
            margin: 80px auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .donation-container h2 {
            font-size: 28px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .donation-container p {
            font-size: 16px;
            color: #555;
            margin-bottom: 30px;
        }

        .donation-container b {
            color: #1d3557;
        }

        #pay-button {
            background-color: #1d3557;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 10px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        #pay-button:hover {
            background-color: #457b9d;
        }
    </style>
</head>
<body>
    <div class="donation-container">
        <h2>Konfirmasi Donasi</h2>
        <p>Terima kasih, <b>{{ $donasi->nama }}</b>!<br>
        Silakan lanjutkan pembayaran donasi sebesar <b>Rp{{ number_format($donasi->jumlah, 0, ',', '.') }}</b>.</p>
        <button id="pay-button">Bayar Sekarang</button>
    </div>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    alert("Pembayaran berhasil!");
                    window.location.href = "{{ route('donations.thanks') }}";
                },
                onPending: function(result){
                    alert("Pembayaran sedang diproses.");
                    window.location.href = "{{ route('donations.thanks') }}";
                },
                onError: function(result){
                    alert("Pembayaran gagal!");
                },
                onClose: function(){
                    alert('Anda menutup popup tanpa menyelesaikan pembayaran');
                }
            });
        }
    </script>
</body>
</html>
