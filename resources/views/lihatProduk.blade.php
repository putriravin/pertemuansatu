@extends('layouts.app')

@section('title', 'Data Produk')

@section('content')
    <div class="card">
        <h2 style="margin-bottom: 20px; color: #1b2d4f; display: flex; justify-content: space-between; align-items: center;">
            Data Produk
            <a href="{{ route('produk.submit') }}" class="btn-primary" style="text-decoration: none; font-size: 13px;">+ Tambah Produk</a>
        </h2>
      
        <div style="overflow-x: auto;">
            <table style="width:100%; border-collapse: collapse; font-size: 14px; text-align: left;">
                <thead>
                    <tr style="background-color: #f8fafe; border-bottom: 2px solid #cce0ff;">
                        <th style="padding: 12px 16px; color: #1b3a6b;">Nama</th>
                        <th style="padding: 12px 16px; color: #1b3a6b;">Harga</th>
                        <th style="padding: 12px 16px; color: #1b3a6b;">Stok</th>
                        <th style="padding: 12px 16px; color: #1b3a6b;">Kategori</th>
                        <th style="padding: 12px 16px; color: #1b3a6b;">Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produks as $produk)
                    <tr style="border-bottom: 1px solid #eef0f5; transition: background-color 0.2s;">
                        <td style="padding: 12px 16px; font-weight: 500;">{{ $produk->nama }}</td>
                        <td style="padding: 12px 16px; color: #444;">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                        <td style="padding: 12px 16px; color: #444;">{{ $produk->stok }}</td>
                        <td style="padding: 12px 16px;">
                            <span style="background-color: #e8f0fe; color: #1b3a6b; padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: 600;">
                                {{ $produk->kategori }}
                            </span>
                        </td>
                        <td style="padding: 12px 16px;">
                            @if($produk->gambar)
                                <img src="{{ asset(str_replace('public/', 'storage/', $produk->gambar)) }}" width="60" style="border-radius: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                            @else
                                <span style="color: #999; font-style: italic;">No Image</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="padding: 24px; text-align: center; color: #777;">
                            Belum ada data produk.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
