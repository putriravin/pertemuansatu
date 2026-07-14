@extends('layouts.app')

@section('title', 'Scan Produk')

@section('content')
    <div class="card">
        <h2 style="color: #1b2d4f; margin-bottom: 4px;">Point of Sale - Scan Produk</h2>
        <p class="text-secondary" style="margin-bottom: 24px;">Gunakan scanner atau masukkan SKU produk secara manual lalu tekan Enter.</p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            {{-- Bagian Kiri: Keranjang / Cart --}}
            <div>
                <h3 style="font-size: 16px; margin-bottom: 12px; color: #1b3a6b;">Keranjang Belanja</h3>
                
                {{-- Input Barcode --}}
                <div style="margin-bottom: 16px;">
                    <input type="text" id="barcodeInput" placeholder="Scan Barcode / Ketik SKU..." 
                           style="width: 100%; padding: 12px; border: 2px solid #c5d5f0; border-radius: 8px; font-size: 16px;">
                </div>

                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
                        <thead>
                            <tr style="background: #f8fafe; border-bottom: 2px solid #cce0ff;">
                                <th style="padding: 10px; text-align: left;">Nama</th>
                                <th style="padding: 10px; text-align: center;">Qty</th>
                                <th style="padding: 10px; text-align: right;">Total</th>
                                <th style="padding: 10px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="cartTableBody">
                            <tr>
                                <td colspan="4" style="text-align: center; padding: 20px; color: #999;">Keranjang kosong.</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr style="background: #eef0f5; font-weight: bold;">
                                <td colspan="2" style="padding: 10px; text-align: right;">Total Bayar</td>
                                <td colspan="2" style="padding: 10px; text-align: left;" id="totalAmount">Rp 0</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            {{-- Bagian Kanan: Detail Produk Terakhir yang di scan --}}
            <div>
                <h3 style="font-size: 16px; margin-bottom: 12px; color: #1b3a6b;">Informasi Produk</h3>
                <div style="border: 1px solid #d0daf0; border-radius: 8px; padding: 20px; background: #fdfdfe; text-align: center; min-height: 250px;">
                    
                    <img id="productImage" src="" alt="Produk" style="max-width: 150px; border-radius: 8px; margin-bottom: 16px; display: none; margin-left: auto; margin-right: auto;">
                    
                    <h4 id="productName" style="color: #1b2d4f; margin-bottom: 8px; font-size: 18px;">Belum ada produk di-scan</h4>
                    <p style="color: #777; font-size: 13px; margin-bottom: 4px;">SKU: <span id="productSku">-</span></p>
                    <p style="color: #777; font-size: 13px; margin-bottom: 8px;">Kategori: <span id="productCategory">-</span></p>
                    <p id="productPrice" style="font-weight: 700; font-size: 20px; color: #1e8e3e; margin-bottom: 0;">-</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        let cart = [];

        function updateCartTable() {
            const tbody = document.getElementById('cartTableBody');
            tbody.innerHTML = '';

            if (cart.length === 0) {
                tbody.innerHTML = '<tr><td colspan="4" style="text-align: center; padding: 20px; color: #999;">Keranjang kosong.</td></tr>';
                document.getElementById('totalAmount').textContent = 'Rp 0';
                return;
            }

            let grandTotal = 0;

            cart.forEach((item, index) => {
                const tr = document.createElement('tr');
                tr.style.borderBottom = '1px solid #eef0f5';

                const totalHarga = item.price * item.qty;
                grandTotal += totalHarga;

                tr.innerHTML = `
                    <td style="padding: 10px; font-weight: 500;">${item.name}</td>
                    <td style="padding: 10px; text-align: center;">${item.qty}</td>
                    <td style="padding: 10px; text-align: right;">Rp ${totalHarga.toLocaleString('id-ID')}</td>
                    <td style="padding: 10px; text-align: center;">
                        <button class="delete-btn" data-index="${index}" style="background: #fce8e6; color: #d93025; border: none; padding: 4px 8px; border-radius: 4px; cursor: pointer; font-size: 12px; font-weight: bold;">Hapus</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });

            document.getElementById('totalAmount').textContent = 'Rp ' + grandTotal.toLocaleString('id-ID');
        }

        document.getElementById('cartTableBody').addEventListener('click', function(e) {
            if (e.target.classList.contains('delete-btn')) {
                const index = e.target.getAttribute('data-index');
                cart.splice(index, 1);
                updateCartTable();
            }
        });

        document.getElementById('barcodeInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const code = this.value.trim();
                if (code === '') return;

                fetch('/scan-produk', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ code })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        const p = data.product;

                        const existingIndex = cart.findIndex(item => item.sku === p.sku);
                        if (existingIndex !== -1) {
                            cart[existingIndex].qty += 1;
                        } else {
                            cart.push({
                                name: p.name,
                                sku: p.sku,
                                price: p.price,
                                qty: 1
                            });
                        }

                        updateCartTable();

                        // Tampilkan info produk di kanan
                        document.getElementById('productName').textContent = p.name;
                        document.getElementById('productSku').textContent = p.sku;
                        document.getElementById('productCategory').textContent = p.kategori;
                        document.getElementById('productPrice').textContent = 'Rp ' + parseInt(p.price).toLocaleString('id-ID');
                        
                        const img = document.getElementById('productImage');
                        if(p.image && !p.image.includes('Tidak ada')) {
                            img.src = p.image;
                            img.style.display = 'block';
                        } else {
                            img.style.display = 'none';
                        }

                        this.value = '';
                    } else {
                        alert(data.message);
                    }
                })
                .catch(err => console.error(err));
            }
        });

        window.onload = function() {
            document.getElementById('barcodeInput').focus();
            updateCartTable();
        }
    </script>
@endsection
