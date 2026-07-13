@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
    <div class="card">
        <h2 style="margin-bottom: 20px; color: #1b2d4f;">Tambah Produk</h2>
      
        <!-- Tampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div style="background-color: #e6f4ea; color: #1e8e3e; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                {{ session('success') }}
            </div>
        @endif
      
        <!-- Tampilkan pesan error jika ada -->
        @if(session('error'))
            <div style="background-color: #fce8e6; color: #d93025; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                {{ session('error') }}
            </div>
        @endif
      
        <form action="{{ route('produk.submit') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 16px;">
            @csrf
            
            <div>
                <label for="nama" style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Nama Produk:</label>
                <input type="text" id="nama" name="nama" style="width: 100%; padding: 10px 12px; border: 1px solid #cce0ff; border-radius: 6px; font-family: inherit;">
            </div>
      
            <div>
                <label for="harga" style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Harga:</label>
                <input type="number" id="harga" name="harga" style="width: 100%; padding: 10px 12px; border: 1px solid #cce0ff; border-radius: 6px; font-family: inherit;">
            </div>
      
            <div>
                <label for="stok" style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Stok:</label>
                <input type="number" id="stok" name="stok" style="width: 100%; padding: 10px 12px; border: 1px solid #cce0ff; border-radius: 6px; font-family: inherit;">
            </div>
      
            <div>
                <label for="kategori" style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Kategori:</label>
                <input type="text" id="kategori" name="kategori" style="width: 100%; padding: 10px 12px; border: 1px solid #cce0ff; border-radius: 6px; font-family: inherit;">
            </div>
      
            <div>
                <label for="gambar" style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Gambar:</label>
                <input type="file" id="gambar" name="gambar" style="width: 100%; padding: 8px 12px; border: 1px dashed #1b3a6b; border-radius: 6px; font-family: inherit; background: #f8fafe;">
            </div>
      
            <div style="margin-top: 10px;">
                <button type="submit" class="btn-primary" style="width: 100%;">Submit Produk</button>
            </div>
        </form>
    </div>
@endsection
