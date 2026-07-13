@extends('layouts.app')

@section('title', 'Nilai Mahasiswa')

@section('content')
    <div class="card">
        @if (!$mahasiswa)
            <div style="text-align: center; padding: 40px 0;">
                <h3 style="color: #d93025; margin-bottom: 10px;">Data Mahasiswa Tidak Ditemukan</h3>
                <p class="text-secondary">Silakan kembali ke halaman sebelumnya.</p>
                <a href="{{ route('mahasiswa.index') }}" class="btn-primary" style="margin-top: 16px;">Kembali</a>
            </div>
        @else
            <div style="border-bottom: 2px solid #eef0f5; padding-bottom: 16px; margin-bottom: 24px;">
                <h2 style="color: #1b2d4f; margin-bottom: 8px;">Rincian Nilai Mahasiswa</h2>
                <p style="font-size: 15px; color: #555;">Nama: <strong style="color: #1b3a6b;">{{ $mahasiswa->nama }}</strong> | NIM: <strong>{{ $mahasiswa->nim }}</strong></p>
            </div>

            <div style="background: #f8fafe; border-radius: 8px; border: 1px solid #d0daf0; overflow: hidden;">
                <ul style="list-style: none; margin: 0; padding: 0;">
                    @forelse ($mahasiswa->nilais as $nilai)
                        <li style="padding: 16px 20px; border-bottom: 1px solid #eef0f5; display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <span style="display: block; font-size: 12px; color: #777; margin-bottom: 4px;">Matakuliah</span>
                                <strong style="font-size: 15px; color: #1b2d4f;">{{ $nilai->matakuliah->nama }}</strong>
                            </div>
                            <div style="text-align: right;">
                                <span style="display: block; font-size: 12px; color: #777; margin-bottom: 4px;">Nilai Akhir</span>
                                <span style="background: {{ $nilai->nilai >= 80 ? '#e6f4ea' : '#fef7e0' }}; color: {{ $nilai->nilai >= 80 ? '#1e8e3e' : '#b08d00' }}; padding: 6px 16px; border-radius: 20px; font-weight: bold; font-size: 14px;">
                                    {{ $nilai->nilai }}
                                </span>
                            </div>
                        </li>
                    @empty
                        <li style="padding: 32px 20px; text-align: center; color: #999; font-style: italic;">
                            Belum ada data nilai yang terdaftar untuk mahasiswa ini.
                        </li>
                    @endforelse
                </ul>
            </div>
            
            <div style="margin-top: 24px;">
                <a href="{{ route('mahasiswa.index') }}" style="background: #eef0f5; color: #444; padding: 10px 24px; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: 600;">Kembali ke Daftar Mahasiswa</a>
            </div>
        @endif
    </div>
@endsection
