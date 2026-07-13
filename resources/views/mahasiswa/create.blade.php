@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
    <div class="card">
        <h2 style="margin-bottom: 6px; color: #1b2d4f;">Tambah Data Mahasiswa</h2>
        <p class="text-secondary" style="margin-bottom: 24px;">Silakan isi formulir di bawah ini untuk menambahkan mahasiswa baru ke dalam sistem.</p>

        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf
            @include('mahasiswa._form')
            
            <div style="display: flex; gap: 12px; margin-top: 10px;">
                <button type="submit" class="btn-primary" style="padding: 10px 24px;">Simpan Data</button>
                <a href="{{ route('mahasiswa.index') }}" style="background: #eef0f5; color: #444; padding: 10px 24px; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: 600;">Batal</a>
            </div>
        </form>
    </div>
@endsection
