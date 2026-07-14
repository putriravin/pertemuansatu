@extends('layouts.app')

@section('title', 'Halaman Dewasa')

@section('content')
    <div class="card">
        <h2 style="margin-bottom: 6px; color: #1b2d4f;">Halaman Khusus Dewasa</h2>
        <p class="text-secondary" style="margin-bottom: 24px;">Selamat datang di halaman khusus umur 18 tahun ke atas.</p>

        <div style="padding: 24px; background: #e6f4ea; border-radius: 8px; border: 1px solid #cce8d6;">
            <p style="margin-bottom: 10px;">Informasi Pengguna Anda:</p>
            <ul style="list-style: none; padding: 0;">
                <li><strong>Nama:</strong> {{ Auth::user()->name }}</li>
                <li><strong>Role:</strong> <span style="background: #1e8e3e; color: #fff; padding: 2px 8px; border-radius: 12px; font-size: 12px; font-weight: bold;">{{ Auth::user()->role }}</span></li>
                <li><strong>Usia:</strong> {{ Auth::user()->usia }} Tahun</li>
            </ul>
        </div>
        
        <div style="margin-top: 24px;">
            <a href="{{ route('dashboard') }}" class="btn-primary" style="padding: 10px 20px;">Kembali ke Dashboard</a>
        </div>
    </div>
@endsection
