@extends('layouts.app')

@section('title', 'Scan Kamera (QR / Barcode)')

@section('content')
    <div class="card">
        <h2 style="color: #1b2d4f; margin-bottom: 4px;">Kamera Pemindai Barcode / QR</h2>
        <p class="text-secondary" style="margin-bottom: 24px;">Arahkan kamera ke <strong>QR Code</strong> produk untuk mendapatkan detail informasinya secara otomatis.</p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; align-items: start;">

            {{-- Kiri: Area Kamera Scanner --}}
            <div>
                <h3 style="font-size: 15px; color: #1b3a6b; margin-bottom: 12px;">Kamera Scanner</h3>
                <div id="reader" style="width: 100%; border-radius: 10px; overflow: hidden; border: 2px solid #c5d5f0;"></div>

                {{-- Status scan --}}
                <div id="scanStatus" style="margin-top: 12px; padding: 12px 16px; border-radius: 8px; background: #f8fafe; border: 1px solid #d0daf0; font-size: 13px; color: #555; text-align: center; display: none;">
                    Sedang memproses hasil scan...
                </div>

                {{-- Input manual --}}
                <div style="margin-top: 16px;">
                    <p style="font-size: 13px; color: #777; margin-bottom: 8px;">Atau masukkan SKU secara manual:</p>
                    <div style="display: flex; gap: 8px;">
                        <input type="text" id="manualInput" placeholder="Ketik SKU produk, tekan Enter..."
                               style="flex: 1; padding: 10px 14px; border: 1.5px solid #c5d5f0; border-radius: 8px; font-size: 14px;">
                        <button onclick="lookupProduct(document.getElementById('manualInput').value)"
                                style="background: #1b3a6b; color: white; padding: 10px 18px; border: none; border-radius: 8px; font-size: 13px; font-weight: 600; cursor: pointer;">
                            Cari
                        </button>
                    </div>
                </div>
            </div>

            {{-- Kanan: Hasil Scan / Detail Produk --}}
            <div>
                <h3 style="font-size: 15px; color: #1b3a6b; margin-bottom: 12px;">Hasil Scan</h3>
                
                {{-- State awal --}}
                <div id="resultEmpty" style="border: 2px dashed #d0daf0; border-radius: 10px; padding: 48px 24px; text-align: center; color: #aaa;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 24 24" stroke="#d0daf0" stroke-width="1.2" style="margin-bottom: 12px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                    </svg>
                    <p style="font-size: 14px;">Belum ada produk yang dipindai.<br>Arahkan kamera ke QR Code produk.</p>
                </div>

                {{-- State tidak ditemukan --}}
                <div id="resultNotFound" style="display: none; border: 1.5px solid #fce8e6; background: #fff8f7; border-radius: 10px; padding: 24px; text-align: center; color: #d93025;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="#d93025" stroke-width="1.5" style="margin-bottom: 10px;"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                    <p style="font-weight: 600; margin-bottom: 4px;">Produk Tidak Ditemukan</p>
                    <p id="notFoundCode" style="font-size: 13px; color: #777;">SKU: -</p>
                </div>

                {{-- State berhasil (Detail Produk) --}}
                <div id="resultCard" style="display: none; border: 1.5px solid #b7dfb9; background: #fcfff9; border-radius: 10px; padding: 24px;">
                    
                    {{-- Badge sukses --}}
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 16px; padding: 10px 14px; background: #e6f4ea; border-radius: 8px; color: #1e8e3e; font-size: 13px; font-weight: 600;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Produk Ditemukan!
                    </div>

                    {{-- Gambar produk --}}
                    <div style="text-align: center; margin-bottom: 16px;">
                        <img id="prodImg" src="" alt="Foto Produk" style="max-width: 140px; max-height: 140px; object-fit: cover; border-radius: 10px; border: 1px solid #d0e8d0; display: none;">
                        <div id="prodImgPlaceholder" style="width: 100px; height: 100px; background: #f3f6fb; border-radius: 10px; border: 1px solid #e0e7ef; display: inline-flex; align-items: center; justify-content: center; margin: 0 auto;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="none" viewBox="0 0 24 24" stroke="#ccc" stroke-width="1.2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                    </div>

                    {{-- Informasi Produk --}}
                    <table style="width: 100%; font-size: 14px; border-collapse: collapse;">
                        <tr style="border-bottom: 1px solid #e8f5e9;">
                            <td style="padding: 10px 0; color: #555; width: 100px;">Nama Produk</td>
                            <td style="padding: 10px 0; font-weight: 700; color: #1b2d4f;" id="prodNama">-</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #e8f5e9;">
                            <td style="padding: 10px 0; color: #555;">SKU</td>
                            <td style="padding: 10px 0; font-weight: 600; color: #1b2d4f;" id="prodSku">-</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #e8f5e9;">
                            <td style="padding: 10px 0; color: #555;">Kategori</td>
                            <td style="padding: 10px 0; font-weight: 600; color: #1b2d4f;" id="prodKategori">-</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #e8f5e9;">
                            <td style="padding: 10px 0; color: #555;">Stok</td>
                            <td style="padding: 10px 0; font-weight: 600; color: #1b2d4f;" id="prodStok">-</td>
                        </tr>
                        <tr>
                            <td style="padding: 10px 0; color: #555;">Harga</td>
                            <td style="padding: 10px 0; font-weight: 800; font-size: 18px; color: #1e8e3e;" id="prodHarga">-</td>
                        </tr>
                    </table>

                    <button onclick="resetScanner()"
                            style="margin-top: 16px; width: 100%; background: #1b3a6b; color: white; border: none; padding: 12px; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer;">
                        Scan Produk Lain
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Library html5-qrcode --}}
    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
    <script>
        let html5QrcodeScanner;

        function startScanner() {
            html5QrcodeScanner = new Html5QrcodeScanner(
                "reader",
                { fps: 30, qrbox: { width: 250, height: 250 } },
                false
            );
            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        }

        function onScanSuccess(decodedText) {
            // Setelah scan berhasil, berhentikan scanner lalu proses
            if (html5QrcodeScanner) {
                html5QrcodeScanner.clear().then(() => {
                    document.getElementById('reader').innerHTML = '';
                });
            }
            lookupProduct(decodedText);
        }

        function onScanFailure(error) {
            // Abaikan error scan (kamera terus jalan)
        }

        function lookupProduct(code) {
            if (!code || code.trim() === '') return;
            code = code.trim();

            document.getElementById('resultEmpty').style.display = 'none';
            document.getElementById('resultNotFound').style.display = 'none';
            document.getElementById('resultCard').style.display = 'none';
            document.getElementById('scanStatus').style.display = 'block';
            document.getElementById('scanStatus').textContent = 'Mencari produk dengan SKU: ' + code + '...';

            fetch('/scan-produk', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ code: code })
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById('scanStatus').style.display = 'none';

                if (data.success) {
                    const p = data.product;

                    document.getElementById('prodNama').textContent = p.name;
                    document.getElementById('prodSku').textContent = p.sku ?? code;
                    document.getElementById('prodKategori').textContent = p.kategori ?? '-';
                    document.getElementById('prodStok').textContent = (p.stok ?? '-') + ' unit';
                    document.getElementById('prodHarga').textContent = 'Rp ' + parseInt(p.price).toLocaleString('id-ID');

                    const img = document.getElementById('prodImg');
                    const placeholder = document.getElementById('prodImgPlaceholder');
                    if (p.image && p.image.length > 0 && !p.image.includes('null')) {
                        img.src = p.image;
                        img.style.display = 'block';
                        placeholder.style.display = 'none';
                    } else {
                        img.style.display = 'none';
                        placeholder.style.display = 'inline-flex';
                    }

                    document.getElementById('resultCard').style.display = 'block';
                } else {
                    document.getElementById('notFoundCode').textContent = 'SKU: ' + code;
                    document.getElementById('resultNotFound').style.display = 'block';
                    // Restart scanner setelah 2 detik jika tidak ditemukan
                    setTimeout(() => {
                        resetScanner();
                    }, 2500);
                }
            })
            .catch(() => {
                document.getElementById('scanStatus').style.display = 'none';
                document.getElementById('resultEmpty').style.display = 'block';
            });
        }

        function resetScanner() {
            document.getElementById('resultCard').style.display = 'none';
            document.getElementById('resultNotFound').style.display = 'none';
            document.getElementById('scanStatus').style.display = 'none';
            document.getElementById('resultEmpty').style.display = 'block';
            document.getElementById('manualInput').value = '';
            startScanner();
        }

        // Input manual - tekan Enter
        document.getElementById('manualInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') lookupProduct(this.value);
        });

        // Mulai scanner saat halaman dimuat
        window.onload = function() {
            startScanner();
        };
    </script>
@endsection

