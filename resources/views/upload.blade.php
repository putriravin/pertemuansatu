@extends('layouts.app')

@section('title', 'Upload File')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
            <h2 style="color: #1b2d4f; margin: 0;">Upload File Gambar</h2>
            <a href="{{ route('files.list') }}" class="btn-primary" style="padding: 8px 18px; font-size: 13px; display: inline-flex; align-items: center; gap: 6px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                Lihat Semua File
            </a>
        </div>
        <p class="text-secondary" style="margin-bottom: 24px;">Upload file gambar dalam format JPG, JPEG, atau PNG. Maksimal ukuran file 2MB.</p>

        {{-- Notifikasi Sukses --}}
        @if(session('success'))
            <div style="background-color: #e6f4ea; color: #1e8e3e; padding: 14px 18px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; display: flex; align-items: center; gap: 10px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                <div>
                    {{ session('success') }}
                    @if(session('file'))
                        <br>
                        <a href="{{ Storage::url(session('file')) }}" target="_blank" style="color: #1b3a6b; font-weight: 600; margin-top: 4px; display: inline-block;">
                            Lihat File yang Diupload
                        </a>
                    @endif
                </div>
            </div>
        @endif

        {{-- Form Upload --}}
        <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div style="border: 2px dashed #c5d5f0; border-radius: 12px; padding: 48px 20px; text-align: center; background: #f8fafe; margin-bottom: 16px; cursor: pointer;" onclick="document.getElementById('file').click()">
                <svg xmlns="http://www.w3.org/2000/svg" width="52" height="52" fill="none" viewBox="0 0 24 24" stroke="#1b3a6b" stroke-width="1.2" style="margin-bottom: 12px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p style="font-weight: 600; color: #1b3a6b; margin-bottom: 4px;">Klik untuk pilih file gambar</p>
                <p style="color: #999; font-size: 13px; margin: 0;">Format: JPG, JPEG, PNG &nbsp;|&nbsp; Maks: 2MB</p>
                <input type="file" name="file" id="file" accept=".jpg,.jpeg,.png" style="display: none;"
                    onchange="document.getElementById('file-label').textContent = this.files[0] ? this.files[0].name : 'Belum ada file dipilih'">
            </div>

            <p id="file-label" style="text-align: center; font-size: 13px; color: #555; margin-bottom: 14px;">Belum ada file dipilih</p>

            @error('file')
                <div style="color: #d93025; font-size: 13px; text-align: center; margin-bottom: 14px; display: flex; align-items: center; justify-content: center; gap: 6px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="btn-primary" style="width: 100%; padding: 12px; font-size: 15px; display: flex; align-items: center; justify-content: center; gap: 8px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                Upload File
            </button>
        </form>
    </div>
@endsection
