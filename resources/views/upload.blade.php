@extends('layouts.app')

@section('title', 'Upload File')

@section('content')
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
            <h2 style="color: #1b2d4f; margin: 0;">Upload File Gambar</h2>
            <a href="{{ route('files.list') }}" class="btn-primary" style="padding: 8px 18px; font-size: 13px;">📁 Lihat Semua File</a>
        </div>
        <p class="text-secondary" style="margin-bottom: 24px;">Upload file gambar dalam format JPG, JPEG, atau PNG. Maksimal ukuran file 2MB.</p>

        {{-- Notifikasi Sukses --}}
        @if(session('success'))
            <div style="background-color: #e6f4ea; color: #1e8e3e; padding: 14px 18px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                ✅ {{ session('success') }}
                @if(session('file'))
                    <br>
                    <a href="{{ Storage::url(session('file')) }}" target="_blank" style="color: #1b3a6b; font-weight: 600; margin-top: 6px; display: inline-block;">
                        🔗 Lihat File yang Diupload
                    </a>
                @endif
            </div>
        @endif

        {{-- Form Upload --}}
        <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div style="border: 2px dashed #c5d5f0; border-radius: 12px; padding: 40px; text-align: center; background: #f8fafe; margin-bottom: 20px; cursor: pointer;" onclick="document.getElementById('file').click()">
                <div style="font-size: 48px; margin-bottom: 10px;">🖼️</div>
                <p style="font-weight: 600; color: #1b3a6b; margin-bottom: 4px;">Klik untuk pilih file</p>
                <p style="color: #999; font-size: 13px; margin: 0;">Format: JPG, JPEG, PNG | Maks: 2MB</p>
                <input type="file" name="file" id="file" accept=".jpg,.jpeg,.png" style="display: none;"
                    onchange="document.getElementById('file-label').textContent = this.files[0] ? this.files[0].name : 'Belum ada file dipilih'">
            </div>
            <p id="file-label" style="text-align: center; font-size: 13px; color: #555; margin-bottom: 16px;">Belum ada file dipilih</p>

            @error('file')
                <div style="color: #d93025; font-size: 13px; text-align: center; margin-bottom: 14px;">
                    ⚠️ {{ $message }}
                </div>
            @enderror

            <button type="submit" class="btn-primary" style="width: 100%; padding: 12px; font-size: 15px;">⬆️ Upload File</button>
        </form>
    </div>
@endsection
