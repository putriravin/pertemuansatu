@extends('layouts.app')

@section('title', 'Daftar Kelas')

@section('content')

    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div>
                <h2 style="margin-bottom: 4px;">Daftar Kelas yang Tersedia</h2>
                <p class="text-secondary">Total {{ count($produks) }} kelas terdaftar</p>
            </div>
            <a href="/tambah-produk" class="btn-primary" style="text-decoration: none;">+ Tambah Kelas</a>
        </div>

        @if(count($produks) == 0)
            <p style="text-align: center; color: #999; padding: 32px 0;">Belum ada kelas yang ditambahkan.</p>
        @else
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
                    <thead>
                        <tr style="background: #f0f4ff; border-bottom: 2px solid #d0daf0;">
                            <th style="padding: 12px 16px; text-align: left; color: #1b3a6b; font-size: 13px;">Nama Kelas</th>
                            <th style="padding: 12px 16px; text-align: left; color: #1b3a6b; font-size: 13px;">Kategori</th>
                            <th style="padding: 12px 16px; text-align: left; color: #1b3a6b; font-size: 13px;">Harga</th>
                            <th style="padding: 12px 16px; text-align: left; color: #1b3a6b; font-size: 13px;">Kuota</th>
                            <th style="padding: 12px 16px; text-align: left; color: #1b3a6b; font-size: 13px;">Thumbnail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produks as $produk)
                        <tr style="border-bottom: 1px solid #eef0f5;">
                            <td style="padding: 14px 16px; font-weight: 600; color: #1b2d4f;">{{ $produk->nama }}</td>
                            <td style="padding: 14px 16px;">
                                <span style="background: #e8f0fe; color: #1b3a6b; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: 600;">
                                    {{ $produk->kategori }}
                                </span>
                            </td>
                            <td style="padding: 14px 16px; color: #444;">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                            <td style="padding: 14px 16px; color: #444;">{{ $produk->stok }} slot</td>
                            <td style="padding: 14px 16px;">
                                @if($produk->gambar)
                                    <img src="{{ asset(str_replace('public/', 'storage/', $produk->gambar)) }}"
                                        width="70" style="border-radius: 6px; border: 1px solid #eef0f5;">
                                @else
                                    <span style="color: #bbb; font-style: italic; font-size: 12px;">Tidak ada</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

@endsection
