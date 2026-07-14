@extends('layouts.app')

@section('title', 'Scan Kamera (QR / Barcode)')

@section('content')
    <div class="card">
        <h2 style="color: #1b2d4f; margin-bottom: 4px;">Kamera Pemindai Barcode / QR</h2>
        <p class="text-secondary" style="margin-bottom: 24px;">Izinkan akses kamera browser Anda untuk memindai kode produk.</p>

        <div style="display: flex; flex-direction: column; align-items: center;">
            <div id="reader" style="width: 100%; max-width: 500px; border-radius: 8px; overflow: hidden; border: 2px solid #d0daf0;"></div>
            <div id="result" style="margin-top: 20px; font-weight: bold; color: #1e8e3e; font-size: 18px;"></div>
        </div>
    </div>

    <script src="https://unpkg.com/html5-qrcode/"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            document.getElementById('result').innerText = `Hasil Scan: ${decodedText}`;
            
            // Redirect ke halaman scandataproduk lalu pass barcode-nya, 
            // Atau untuk simulasi kita alert saja. (Karena di modul ini 2 hal terpisah).
            // Tapi agar lebih keren, kalau scan berhasil, bisa diarahkan ke search.
            alert("Berhasil scan: " + decodedText);
            
            html5QrcodeScanner.clear();
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader",
            { fps: 10, qrbox: {width: 250, height: 250} },
            /* verbose= */ false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endsection
