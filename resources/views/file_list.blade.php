@extends('layouts.app')

@section('title', 'Daftar File')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
            <h2 style="color: #1b2d4f; margin: 0;">Daftar File yang Diupload</h2>
            <a href="{{ route('upload.form') }}" class="btn-primary" style="padding: 8px 18px; font-size: 13px; display: inline-flex; align-items: center; gap: 6px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                Upload File Baru
            </a>
        </div>
        <p class="text-secondary" style="margin-bottom: 24px;">Semua file gambar yang telah diupload ke server tersimpan di sini.</p>

        {{-- Notifikasi --}}
        @if(session('success'))
            <div style="background-color: #e6f4ea; color: #1e8e3e; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; display: flex; align-items: center; gap: 8px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                {{ session('success') }}
            </div>
        @endif

        @if(count($files) === 0)
            <div style="text-align: center; padding: 60px 0; color: #aaa;">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="none" viewBox="0 0 24 24" stroke="#ccc" stroke-width="1" style="margin-bottom: 16px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                </svg>
                <p style="font-size: 15px; margin-bottom: 16px;">Belum ada file yang diupload.</p>
                <a href="{{ route('upload.form') }}" class="btn-primary" style="display: inline-block; padding: 10px 20px;">Upload Sekarang</a>
            </div>
        @else
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
                            @php
                                $filename = basename($file);  // Ambil nama file asli
                                $imageUrl = asset('storage/' . $file); // URL gambar yang benar
                            @endphp
                            <tr style="border-bottom: 1px solid #eef0f5;">
                                <td style="padding: 14px 16px; color: #777;">{{ $index + 1 }}</td>

                                {{-- Preview Gambar --}}
                                <td style="padding: 14px 16px;">
                                    <img src="{{ $imageUrl }}" alt="{{ $filename }}"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                         style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; border: 1px solid #e0e7ef; display: block;">
                                    <div style="display: none; width: 80px; height: 80px; background: #f3f6fb; border-radius: 8px; border: 1px solid #e0e7ef; align-items: center; justify-content: center;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="#ccc" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    </div>
                                </td>

                                {{-- Nama File Asli --}}
                                <td style="padding: 14px 16px; color: #1b2d4f; font-weight: 600;">
                                    {{ $filename }}
                                </td>

                                <td style="padding: 14px 16px;">
                                    {{-- Download --}}
                                    <a href="{{ $imageUrl }}" download="{{ $filename }}"
                                       style="background: #e8f0fe; color: #1b3a6b; padding: 7px 14px; border-radius: 6px; text-decoration: none; font-size: 12px; font-weight: 600; margin-right: 6px; display: inline-flex; align-items: center; gap: 5px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                        Download
                                    </a>

                                    {{-- Hapus --}}
                                    <form action="{{ route('files.delete', $filename) }}" method="POST" style="display: inline;"
                                          onsubmit="return confirm('Hapus file {{ $filename }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            style="background: #fce8e6; color: #d93025; padding: 7px 14px; border-radius: 6px; border: none; font-size: 12px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 5px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            Hapus
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
