@extends('layouts.app')

@section('title', 'Tambah Kelas Baru')

@section('content')

    <div class="card">
        <h2 style="margin-bottom: 6px;">Tambah Kelas Baru</h2>
        <p class="text-secondary" style="margin-bottom: 24px;">Isi form di bawah untuk menambahkan kelas ke daftar produk kursus.</p>

        {{-- Pesan sukses --}}
        @if(session('success'))
            <div style="background: #e6f4ea; color: #1a7a3c; padding: 12px 16px; border-radius: 8px; font-size: 13px; margin-bottom: 20px;">
                ✓ {{ session('success') }}
            </div>
        @endif

        {{-- Pesan error --}}
        @if(session('error'))
            <div style="background: #fce8e6; color: #b00020; padding: 12px 16px; border-radius: 8px; font-size: 13px; margin-bottom: 20px;">
                ✗ {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('produk.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div style="margin-bottom: 18px;">
                <label for="nama" style="display: block; font-size: 13px; font-weight: 600; color: #1b3a6b; margin-bottom: 6px;">Nama Kelas / Kursus</label>
                <input type="text" id="nama" name="nama" placeholder="Contoh: Kelas Dasar CSS"
                    style="width: 100%; padding: 10px 14px; border: 1px solid #d0daf0; border-radius: 8px; font-size: 14px; font-family: inherit; outline: none;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 18px;">
                <div>
                    <label for="harga" style="display: block; font-size: 13px; font-weight: 600; color: #1b3a6b; margin-bottom: 6px;">Harga Kelas (Rp)</label>
                    <input type="number" id="harga" name="harga" placeholder="Contoh: 150000"
                        style="width: 100%; padding: 10px 14px; border: 1px solid #d0daf0; border-radius: 8px; font-size: 14px; font-family: inherit; outline: none;">
                </div>
                <div>
                    <label for="stok" style="display: block; font-size: 13px; font-weight: 600; color: #1b3a6b; margin-bottom: 6px;">Kuota Peserta (Slot)</label>
                    <input type="number" id="stok" name="stok" placeholder="Contoh: 50"
                        style="width: 100%; padding: 10px 14px; border: 1px solid #d0daf0; border-radius: 8px; font-size: 14px; font-family: inherit; outline: none;">
                </div>
            </div>

            <div style="margin-bottom: 18px;">
                <label for="kategori" style="display: block; font-size: 13px; font-weight: 600; color: #1b3a6b; margin-bottom: 6px;">Kategori</label>
                <input type="text" id="kategori" name="kategori" placeholder="Contoh: Front-End / Back-End / Dasar"
                    style="width: 100%; padding: 10px 14px; border: 1px solid #d0daf0; border-radius: 8px; font-size: 14px; font-family: inherit; outline: none;">
            </div>

            <div style="margin-bottom: 28px;">
                <label for="gambar" style="display: block; font-size: 13px; font-weight: 600; color: #1b3a6b; margin-bottom: 6px;">Thumbnail Kelas</label>
                <input type="file" id="gambar" name="gambar"
                    style="width: 100%; padding: 10px 14px; border: 1px dashed #1b3a6b; border-radius: 8px; font-size: 13px; font-family: inherit; background: #f5f8ff;">
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; padding: 12px; font-size: 14px;">
                Tambah Kelas
            </button>
        </form>
    </div>

@endsection
