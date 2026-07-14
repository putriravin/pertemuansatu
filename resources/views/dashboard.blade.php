@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card">
        {{-- Notifikasi Sukses --}}
        @if(session('success'))
            <div style="background-color: #e6f4ea; color: #1e8e3e; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; display: flex; align-items: center; gap: 10px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- Notifikasi Error / Akses Ditolak --}}
        @if(session('error'))
            <div style="background-color: #fce8e6; color: #d93025; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; display: flex; align-items: center; gap: 10px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                {{ session('error') }}
            </div>
        @endif

        <h2 style="margin-bottom: 4px; color: #1b2d4f;">Halaman Dashboard</h2>
        <p class="text-secondary" style="margin-bottom: 24px;">Welcome, <strong>{{ auth()->user()->email }}</strong></p>

        {{-- Info User Card --}}
        <div style="background: #f8fafe; border: 1px solid #d0daf0; border-radius: 10px; padding: 20px; margin-bottom: 28px;">
            <h3 style="font-size: 15px; color: #1b3a6b; margin-bottom: 14px;">Informasi Akun Anda</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px;">
                <div style="text-align: center; background: white; border-radius: 8px; padding: 16px; border: 1px solid #eef0f5;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="#1b3a6b" stroke-width="1.5" style="margin-bottom:8px;"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <div style="font-size: 12px; color: #777; margin-bottom: 4px;">Nama</div>
                    <div style="font-weight: 700; color: #1b2d4f;">{{ auth()->user()->name ?: '-' }}</div>
                </div>
                <div style="text-align: center; background: white; border-radius: 8px; padding: 16px; border: 1px solid #eef0f5;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="#1b3a6b" stroke-width="1.5" style="margin-bottom:8px;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <div style="font-size: 12px; color: #777; margin-bottom: 4px;">Role</div>
                    <span style="background: #e8f0fe; color: #1b3a6b; padding: 4px 14px; border-radius: 20px; font-size: 13px; font-weight: 700;">
                        {{ auth()->user()->role ?? 'N/A' }}
                    </span>
                </div>
                <div style="text-align: center; background: white; border-radius: 8px; padding: 16px; border: 1px solid #eef0f5;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="#1b3a6b" stroke-width="1.5" style="margin-bottom:8px;"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <div style="font-size: 12px; color: #777; margin-bottom: 4px;">Usia</div>
                    <div style="font-weight: 700; color: #1b2d4f;">{{ auth()->user()->usia ? auth()->user()->usia . ' Tahun' : 'Belum diset' }}</div>
                </div>
            </div>
        </div>

        {{-- Akses Halaman Berdasarkan Role / Usia (Modul 7) --}}
        <h3 style="font-size: 15px; color: #1b3a6b; margin-bottom: 14px;">Akses Halaman (Modul 7 - Middleware)</h3>
        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 14px;">

            {{-- Admin Page --}}
            <div style="border: 1px solid #d0daf0; border-radius: 10px; padding: 18px; text-align: center; background: white;">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="#1b3a6b" stroke-width="1.5" style="margin-bottom:10px;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                <h4 style="color: #1b2d4f; margin-bottom: 6px;">Admin Page</h4>
                <p style="font-size: 12px; color: #777; margin-bottom: 14px;">Hanya bisa diakses oleh user dengan role <strong>admin</strong>.</p>
                <a href="{{ route('admin') }}" style="display: block; background: #1b3a6b; color: white; padding: 8px; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: 600;">
                    Akses Halaman Admin
                </a>
            </div>

            {{-- Owner Page --}}
            <div style="border: 1px solid #f0daa0; border-radius: 10px; padding: 18px; text-align: center; background: white;">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="#b08d00" stroke-width="1.5" style="margin-bottom:10px;"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                <h4 style="color: #1b2d4f; margin-bottom: 6px;">Owner Page</h4>
                <p style="font-size: 12px; color: #777; margin-bottom: 14px;">Hanya bisa diakses oleh user dengan role <strong>owner</strong>.</p>
                <a href="{{ route('owner') }}" style="display: block; background: #b08d00; color: white; padding: 8px; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: 600;">
                    Akses Halaman Owner
                </a>
            </div>

            {{-- Dewasa Page (Tugas Modul 7) --}}
            <div style="border: 1px solid #b7dfb9; border-radius: 10px; padding: 18px; text-align: center; background: white;">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="#1e8e3e" stroke-width="1.5" style="margin-bottom:10px;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                <h4 style="color: #1b2d4f; margin-bottom: 6px;">Halaman Dewasa</h4>
                <p style="font-size: 12px; color: #777; margin-bottom: 14px;">Hanya bisa diakses jika usia user <strong>18 tahun ke atas</strong>.</p>
                <a href="{{ route('dewasa') }}" style="display: block; background: #1e8e3e; color: white; padding: 8px; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: 600;">
                    Akses Halaman Dewasa
                </a>
            </div>
        </div>

        {{-- Akun Testing --}}
        <div style="margin-top: 28px; background: #fffbee; border: 1px solid #f0e0a0; border-radius: 8px; padding: 16px;">
            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#b08d00" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <strong style="font-size: 13px; color: #7a6000;">Akun Testing:</strong>
            </div>
            <div style="font-size: 13px; display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px; color: #555;">
                <div><strong>Admin</strong><br>admin@example.com<br><span style="color: #999;">pass: adminpassword</span></div>
                <div><strong>Owner</strong><br>owner@example.com<br><span style="color: #999;">pass: ownerpassword</span></div>
                <div><strong>Anak (usia 15)</strong><br>anak@example.com<br><span style="color: #999;">pass: anakpassword</span></div>
            </div>
        </div>
    </div>
@endsection
