@extends('layouts.app')

@section('title', 'Daftar File')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
            <h2 style="color: #1b2d4f; margin: 0;">Daftar File yang Diupload</h2>
            <a href="{{ route('upload.form') }}" class="btn-primary" style="padding: 8px 18px; font-size: 13px;">⬆️ Upload File Baru</a>
        </div>
        <p class="text-secondary" style="margin-bottom: 24px;">Semua file gambar yang telah diupload ke server tersimpan di sini.</p>

        {{-- Notifikasi --}}
        @if(session('success'))
            <div style="background-color: #e6f4ea; color: #1e8e3e; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if(count($files) === 0)
            <div style="text-align: center; padding: 60px 0; color: #aaa;">
                <div style="font-size: 52px; margin-bottom: 14px;">📭</div>
                <p style="font-size: 15px;">Belum ada file yang diupload.</p>
                <a href="{{ route('upload.form') }}" class="btn-primary" style="display: inline-block; margin-top: 12px; padding: 10px 20px;">Upload Sekarang</a>
            </div>
        @else
            {{-- Tugas 2: Tabel Daftar File dengan link Download --}}
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
                    <thead>
                        <tr style="background: #f8fafe; border-bottom: 2px solid #cce0ff;">
                            <th style="padding: 12px 16px; color: #1b3a6b; text-align: left;">No</th>
                            <th style="padding: 12px 16px; color: #1b3a6b; text-align: left;">Preview</th>
                            <th style="padding: 12px 16px; color: #1b3a6b; text-align: left;">Nama File</th>
                            <th style="padding: 12px 16px; color: #1b3a6b; text-align: left;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $index => $file)
                            <tr style="border-bottom: 1px solid #eef0f5;">
                                <td style="padding: 14px 16px; color: #777;">{{ $index + 1 }}</td>
                                <td style="padding: 14px 16px;">
                                    <img src="{{ Storage::disk('public')->url($file) }}" alt="{{ basename($file) }}"
                                         style="width: 64px; height: 64px; object-fit: cover; border-radius: 6px; border: 1px solid #eef0f5;">
                                </td>
                                <td style="padding: 14px 16px; color: #1b2d4f; font-weight: 500;">{{ basename($file) }}</td>
                                <td style="padding: 14px 16px;">
                                    {{-- Tugas 2: Link Download --}}
                                    <a href="{{ Storage::disk('public')->url($file) }}" download
                                       style="background: #e8f0fe; color: #1b3a6b; padding: 6px 14px; border-radius: 6px; text-decoration: none; font-size: 12px; font-weight: 600; margin-right: 6px;">
                                        ⬇️ Download
                                    </a>

                                    {{-- Tugas 3: Tombol Hapus --}}
                                    <form action="{{ route('files.delete', basename($file)) }}" method="POST" style="display: inline;"
                                          onsubmit="return confirm('Hapus file {{ basename($file) }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            style="background: #fce8e6; color: #d93025; padding: 6px 14px; border-radius: 6px; border: none; font-size: 12px; font-weight: 600; cursor: pointer;">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
