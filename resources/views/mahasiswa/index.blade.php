@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div>
                <h2 style="margin-bottom: 4px; color: #1b2d4f;">Data Mahasiswa</h2>
                <p class="text-secondary">Daftar seluruh mahasiswa yang terdaftar</p>
            </div>
            <a href="{{ route('mahasiswa.create') }}" class="btn-primary" style="text-decoration: none; font-size: 13px;">+ Tambah Mahasiswa</a>
        </div>

        @if(session('success'))
            <div style="background-color: #e6f4ea; color: #1e8e3e; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                {{ session('success') }}
            </div>
        @endif

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 14px; text-align: left;">
                <thead>
                    <tr style="background-color: #f8fafe; border-bottom: 2px solid #cce0ff;">
                        <th style="padding: 12px 16px; color: #1b3a6b;">Nama</th>
                        <th style="padding: 12px 16px; color: #1b3a6b;">NIM</th>
                        <th style="padding: 12px 16px; color: #1b3a6b;">Alamat</th>
                        <th style="padding: 12px 16px; color: #1b3a6b;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswas as $mahasiswa)
                        <tr style="border-bottom: 1px solid #eef0f5; transition: background-color 0.2s;">
                            <td style="padding: 14px 16px; font-weight: 500; color: #1b2d4f;">{{ $mahasiswa->nama }}</td>
                            <td style="padding: 14px 16px; color: #555;">{{ $mahasiswa->nim }}</td>
                            <td style="padding: 14px 16px; color: #555;">{{ $mahasiswa->alamat }}</td>
                            <td style="padding: 14px 16px;">
                                <div style="display: flex; gap: 8px;">
                                    <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" style="background: #f0c040; color: #fff; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 12px; font-weight: 600;">Edit</a>
                                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" style="margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background: #d93025; color: #fff; padding: 6px 12px; border: none; border-radius: 6px; font-size: 12px; font-weight: 600; cursor: pointer;" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                    <a href="{{ route('tampilnilai', $mahasiswa->id) }}" style="background: #1e8e3e; color: #fff; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 12px; font-weight: 600;">Lihat Nilai</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="padding: 24px; text-align: center; color: #777;">Belum ada data mahasiswa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
