@extends('layouts.app')

@section('title', 'Data Nilai Mahasiswa')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div>
                <h2 style="margin-bottom: 4px; color: #1b2d4f;">Data Nilai Mahasiswa</h2>
                <p class="text-secondary">Daftar keseluruhan nilai mahasiswa dan matakuliah</p>
            </div>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 14px; text-align: left;">
                <thead>
                    <tr style="background-color: #f8fafe; border-bottom: 2px solid #cce0ff;">
                        <th style="padding: 12px 16px; color: #1b3a6b;">No</th>
                        <th style="padding: 12px 16px; color: #1b3a6b;">NIM</th>
                        <th style="padding: 12px 16px; color: #1b3a6b;">Nama Mahasiswa</th>
                        <th style="padding: 12px 16px; color: #1b3a6b;">Matakuliah</th>
                        <th style="padding: 12px 16px; color: #1b3a6b;">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataNilai as $nilai)
                        <tr style="border-bottom: 1px solid #eef0f5; transition: background-color 0.2s;">
                            <td style="padding: 14px 16px; color: #555;">{{ $loop->iteration }}</td>
                            <td style="padding: 14px 16px; color: #555;">{{ $nilai->mahasiswa->nim }}</td>
                            <td style="padding: 14px 16px; font-weight: 500; color: #1b2d4f;">{{ $nilai->mahasiswa->nama }}</td>
                            <td style="padding: 14px 16px;">
                                <span style="background: #e8f0fe; color: #1b3a6b; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: 600;">
                                    {{ $nilai->matakuliah->nama }}
                                </span>
                            </td>
                            <td style="padding: 14px 16px; font-weight: bold; color: {{ $nilai->nilai >= 80 ? '#1e8e3e' : '#f0c040' }};">{{ $nilai->nilai }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="padding: 24px; text-align: center; color: #777;">Belum ada data nilai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
