@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card">
        {{-- Notifikasi Sukses --}}
        @if(session('success'))
            <div style="background-color: #e6f4ea; color: #1e8e3e; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; display: flex; align-items: center; gap: 8px;">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{-- Notifikasi Error / Akses Ditolak --}}
        @if(session('error'))
            <div style="background-color: #fce8e6; color: #d93025; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; display: flex; align-items: center; gap: 8px;">
                ⛔ {{ session('error') }}
            </div>
        @endif

        <h2 style="margin-bottom: 4px; color: #1b2d4f;">Halaman Dashboard</h2>
        <p class="text-secondary" style="margin-bottom: 24px;">Welcome, <strong>{{ auth()->user()->email }}</strong></p>

        {{-- Info User Card --}}
        <div style="background: #f8fafe; border: 1px solid #d0daf0; border-radius: 10px; padding: 20px; margin-bottom: 28px;">
            <h3 style="font-size: 15px; color: #1b3a6b; margin-bottom: 14px;">Informasi Akun Anda</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px;">
                <div style="text-align: center; background: white; border-radius: 8px; padding: 16px; border: 1px solid #eef0f5;">
                    <div style="font-size: 12px; color: #777; margin-bottom: 6px;">Nama</div>
                    <div style="font-weight: 700; color: #1b2d4f;">{{ auth()->user()->name ?: '-' }}</div>
                </div>
                <div style="text-align: center; background: white; border-radius: 8px; padding: 16px; border: 1px solid #eef0f5;">
                    <div style="font-size: 12px; color: #777; margin-bottom: 6px;">Role</div>
                    <span style="background: #e8f0fe; color: #1b3a6b; padding: 4px 14px; border-radius: 20px; font-size: 13px; font-weight: 700;">
                        {{ auth()->user()->role ?? 'N/A' }}
                    </span>
                </div>
                <div style="text-align: center; background: white; border-radius: 8px; padding: 16px; border: 1px solid #eef0f5;">
                    <div style="font-size: 12px; color: #777; margin-bottom: 6px;">Usia</div>
                    <div style="font-weight: 700; color: #1b2d4f;">{{ auth()->user()->usia ? auth()->user()->usia . ' Tahun' : 'Belum diset' }}</div>
                </div>
            </div>
        </div>

        {{-- Akses Halaman Berdasarkan Role / Usia (Modul 7) --}}
        <h3 style="font-size: 15px; color: #1b3a6b; margin-bottom: 14px;">Akses Halaman (Modul 7 - Middleware)</h3>
        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 14px;">

            {{-- Admin Page --}}
            <div style="border: 1px solid #d0daf0; border-radius: 10px; padding: 18px; text-align: center; background: white;">
                <div style="font-size: 28px; margin-bottom: 8px;">🛡️</div>
                <h4 style="color: #1b2d4f; margin-bottom: 6px;">Admin Page</h4>
                <p style="font-size: 12px; color: #777; margin-bottom: 14px;">Hanya bisa diakses oleh user dengan role <strong>admin</strong>.</p>
                <a href="{{ route('admin') }}" style="display: block; background: #1b3a6b; color: white; padding: 8px; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: 600;">
                    Akses Halaman Admin
                </a>
            </div>

            {{-- Owner Page --}}
            <div style="border: 1px solid #f0daa0; border-radius: 10px; padding: 18px; text-align: center; background: white;">
                <div style="font-size: 28px; margin-bottom: 8px;">👑</div>
                <h4 style="color: #1b2d4f; margin-bottom: 6px;">Owner Page</h4>
                <p style="font-size: 12px; color: #777; margin-bottom: 14px;">Hanya bisa diakses oleh user dengan role <strong>owner</strong>.</p>
                <a href="{{ route('owner') }}" style="display: block; background: #b08d00; color: white; padding: 8px; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: 600;">
                    Akses Halaman Owner
                </a>
            </div>

            {{-- Dewasa Page (Tugas Modul 7) --}}
            <div style="border: 1px solid #b7dfb9; border-radius: 10px; padding: 18px; text-align: center; background: white;">
                <div style="font-size: 28px; margin-bottom: 8px;">🔞</div>
                <h4 style="color: #1b2d4f; margin-bottom: 6px;">Halaman Dewasa</h4>
                <p style="font-size: 12px; color: #777; margin-bottom: 14px;">Hanya bisa diakses jika usia user <strong>&ge; 18 tahun</strong>.</p>
                <a href="{{ route('dewasa') }}" style="display: block; background: #1e8e3e; color: white; padding: 8px; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: 600;">
                    Akses Halaman Dewasa
                </a>
            </div>
        </div>

        {{-- Akun Testing --}}
        <div style="margin-top: 28px; background: #fffbee; border: 1px dashed #f0c040; border-radius: 8px; padding: 16px;">
            <p style="font-size: 13px; color: #777; margin-bottom: 8px;"><strong>💡 Akun Testing:</strong></p>
            <div style="font-size: 13px; display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px;">
                <div>
                    <strong>Admin</strong><br>
                    admin@example.com<br>
                    <span style="color: #777;">pass: adminpassword</span>
                </div>
                <div>
                    <strong>Owner</strong><br>
                    owner@example.com<br>
                    <span style="color: #777;">pass: ownerpassword</span>
                </div>
                <div>
                    <strong>Anak (usia 15)</strong><br>
                    anak@example.com<br>
                    <span style="color: #777;">pass: anakpassword</span>
                </div>
            </div>
        </div>
    </div>
@endsection
