@extends('layouts.app')

@section('title', 'Tambah Kelas Bootcamp')

@section('content')

    <div class="card">
        <h2 style="margin-bottom: 6px; color: #1b2d4f;">Tambah Kelas Bootcamp</h2>
        <p class="text-secondary" style="margin-bottom: 24px;">Isi formulir di bawah untuk menambahkan kelas baru ke daftar paket kursus online.</p>

        <form action="{{ route('produk.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama Kelas --}}
            <div style="margin-bottom: 18px;">
                <label for="nama" style="display: block; font-size: 13px; font-weight: 600; color: #1b3a6b; margin-bottom: 6px;">
                    Nama Kelas / Kursus <span style="color: red;">*</span>
                </label>
                <input type="text" id="nama" name="nama" placeholder="Contoh: Bootcamp Full Stack Web Developer Batch 3"
                    style="width: 100%; padding: 10px 14px; border: 1.5px solid #d0daf0; border-radius: 8px; font-size: 14px; font-family: inherit; outline: none; box-sizing: border-box;">
            </div>

            {{-- SKU & Kategori --}}
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 18px;">
                <div>
                    <label for="sku" style="display: block; font-size: 13px; font-weight: 600; color: #1b3a6b; margin-bottom: 6px;">
                        Kode SKU (untuk QR Scan) <span style="color: red;">*</span>
                    </label>
                    <input type="text" id="sku" name="sku" placeholder="Contoh: BOOT-FS-001"
                        style="width: 100%; padding: 10px 14px; border: 1.5px solid #d0daf0; border-radius: 8px; font-size: 14px; font-family: inherit; outline: none; box-sizing: border-box;">
                    <p style="font-size: 11px; color: #999; margin-top: 4px;">SKU digunakan sebagai data QR Code untuk scan produk.</p>
                </div>
                <div>
                    <label for="kategori" style="display: block; font-size: 13px; font-weight: 600; color: #1b3a6b; margin-bottom: 6px;">
                        Kategori Kelas <span style="color: red;">*</span>
                    </label>
                    <select id="kategori" name="kategori"
                        style="width: 100%; padding: 10px 14px; border: 1.5px solid #d0daf0; border-radius: 8px; font-size: 14px; font-family: inherit; outline: none; background: white; box-sizing: border-box;">
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        <option value="Front End">Front End</option>
                        <option value="Back End">Back End</option>
                        <option value="Full Stack">Full Stack</option>
                        <option value="UI/UX Design">UI/UX Design</option>
                        <option value="Mobile Development">Mobile Development</option>
                        <option value="Data Science">Data Science</option>
                        <option value="VIP Class">VIP Class</option>
                        <option value="Special Bootcamp">Special Bootcamp</option>
                    </select>
                </div>
            </div>

            {{-- Harga & Kuota --}}
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 18px;">
                <div>
                    <label for="harga" style="display: block; font-size: 13px; font-weight: 600; color: #1b3a6b; margin-bottom: 6px;">
                        Harga per Orang (Rp) <span style="color: red;">*</span>
                    </label>
                    <input type="number" id="harga" name="harga" placeholder="Contoh: 1500000" min="0"
                        style="width: 100%; padding: 10px 14px; border: 1.5px solid #d0daf0; border-radius: 8px; font-size: 14px; font-family: inherit; outline: none; box-sizing: border-box;">
                </div>
                <div>
                    <label for="stok" style="display: block; font-size: 13px; font-weight: 600; color: #1b3a6b; margin-bottom: 6px;">
                        Kuota Peserta (Slot)
                    </label>
                    <input type="number" id="stok" name="stok" placeholder="Contoh: 30" min="1"
                        style="width: 100%; padding: 10px 14px; border: 1.5px solid #d0daf0; border-radius: 8px; font-size: 14px; font-family: inherit; outline: none; box-sizing: border-box;">
                </div>
            </div>

            {{-- Thumbnail --}}
            <div style="margin-bottom: 28px;">
                <label for="gambar" style="display: block; font-size: 13px; font-weight: 600; color: #1b3a6b; margin-bottom: 6px;">
                    Thumbnail / Banner Kelas
                </label>
                <input type="file" id="gambar" name="gambar" accept="image/*"
                    style="width: 100%; padding: 10px 14px; border: 1.5px dashed #1b3a6b; border-radius: 8px; font-size: 13px; font-family: inherit; background: #f5f8ff; box-sizing: border-box;">
                <p style="font-size: 11px; color: #999; margin-top: 4px;">Format: JPG, PNG. Maksimal 2MB.</p>
            </div>

            <div style="display: flex; gap: 12px;">
                <button type="submit" class="btn-primary" style="flex: 1; padding: 13px; font-size: 14px;">
                    + Tambah Kelas Bootcamp
                </button>
                <a href="{{ route('produk.data') }}" style="background: #eef0f5; color: #444; padding: 13px 24px; border-radius: 8px; text-decoration: none; font-size: 14px; font-weight: 600; display: flex; align-items: center;">
                    Lihat Daftar Kelas
                </a>
            </div>
        </form>
    </div>

@endsection

