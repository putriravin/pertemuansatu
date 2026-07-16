@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card" style="padding: 40px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); max-width: 1000px; margin: 0 auto;">
        {{-- Notifikasi Sukses --}}
        @if(session('success'))
            <div style="background-color: #f1fdf4; color: #1e8e3e; padding: 14px 20px; border-radius: 8px; margin-bottom: 32px; font-size: 14px; display: flex; align-items: center; gap: 12px; font-weight: 500;">
                <div style="background-color: #1e8e3e; color: white; border-radius: 50%; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                </div>
                {{ session('success') }}
            </div>
        @endif

        {{-- Notifikasi Error --}}
        @if(session('error'))
            <div style="background-color: #fce8e6; color: #d93025; padding: 14px 20px; border-radius: 8px; margin-bottom: 32px; font-size: 14px; display: flex; align-items: center; gap: 12px; font-weight: 500;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                {{ session('error') }}
            </div>
        @endif

        <h1 style="margin-bottom: 8px; color: #1b2d4f; font-size: 28px; font-weight: 800;">Halaman Dashboard</h1>
        <p class="text-secondary" style="margin-bottom: 32px; font-size: 15px;">Welcome, <strong>{{ auth()->user()->email ?? 'admin@example.com' }}</strong></p>

        {{-- Info User Card --}}
        <div style="background: #fcfdfe; border: 1px solid #eef2fa; border-radius: 12px; padding: 24px; margin-bottom: 40px;">
            <h3 style="font-size: 16px; font-weight: 800; color: #1b3a6b; margin-bottom: 24px;">Informasi Akun Anda</h3>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 24px;">
                <!-- Nama -->
                <div style="text-align: center; background: white; border-radius: 12px; padding: 32px 16px; border: 1px solid #f3f6fb; box-shadow: 0 4px 16px rgba(0,0,0,0.03);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="none" viewBox="0 0 24 24" stroke="#1b3a6b" stroke-width="1.5" style="margin-bottom:16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <div style="font-size: 14px; color: #666; margin-bottom: 8px;">Nama</div>
                    <div style="font-weight: 800; color: #1b2d4f; font-size: 18px;">{{ auth()->user()->name ?: 'Admin User' }}</div>
                </div>
                
                <!-- Role -->
                <div style="text-align: center; background: white; border-radius: 12px; padding: 32px 16px; border: 1px solid #f3f6fb; box-shadow: 0 4px 16px rgba(0,0,0,0.03);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="none" viewBox="0 0 24 24" stroke="#1b3a6b" stroke-width="1.5" style="margin-bottom:16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <div style="font-size: 14px; color: #666; margin-bottom: 8px;">Role</div>
                    <span style="background: #e8f0fe; color: #1b3a6b; padding: 6px 18px; border-radius: 20px; font-size: 14px; font-weight: 800;">
                        {{ auth()->user()->role ?? 'admin' }}
                    </span>
                </div>
                
                <!-- Usia -->
                <div style="text-align: center; background: white; border-radius: 12px; padding: 32px 16px; border: 1px solid #f3f6fb; box-shadow: 0 4px 16px rgba(0,0,0,0.03);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="none" viewBox="0 0 24 24" stroke="#1b3a6b" stroke-width="1.5" style="margin-bottom:16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <div style="font-size: 14px; color: #666; margin-bottom: 8px;">Usia</div>
                    <div style="font-weight: 800; color: #1b2d4f; font-size: 18px;">{{ auth()->user()->usia ? auth()->user()->usia . ' Tahun' : '25 Tahun' }}</div>
                </div>
            </div>
        </div>

        {{-- Akses Halaman Berdasarkan Role / Usia --}}
        <h3 style="font-size: 18px; font-weight: 800; color: #1b3a6b; margin-bottom: 8px;">Fitur Berdasarkan Hak Akses</h3>
        <p style="font-size: 14px; color: #666; margin-bottom: 24px;">Pilih halaman yang dapat diakses sesuai dengan hak akses dan status akun Anda.</p>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 24px;">

            {{-- Admin Page --}}
            <div style="border: 1.5px solid #8ba4d8; border-radius: 12px; padding: 32px 24px 24px; text-align: center; background: #fdfefe; display: flex; flex-direction: column;">
                <div style="width: 64px; height: 64px; background: #ebf0fa; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="#1b3a6b" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h4 style="color: #1b2d4f; font-size: 16px; font-weight: 800; margin-bottom: 16px;">Panel Administrator</h4>
                <p style="font-size: 13px; color: #666; line-height: 1.6; margin-bottom: 32px; flex-grow: 1;">Halaman khusus untuk pengguna dengan peran <strong>Administrator</strong> yang memiliki hak untuk mengelola sistem.</p>
                <a href="{{ route('admin') }}" style="display: flex; align-items: center; justify-content: center; gap: 8px; background: #153c74; color: white; padding: 14px; border-radius: 8px; text-decoration: none; font-size: 14px; font-weight: 600;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    Masuk ke Panel Admin
                </a>
            </div>

            {{-- Owner Page --}}
            <div style="border: 1.5px solid #dcc472; border-radius: 12px; padding: 32px 24px 24px; text-align: center; background: #fefdfa; display: flex; flex-direction: column;">
                <div style="width: 64px; height: 64px; background: #fcf4db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="#b08d00" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                </div>
                <h4 style="color: #1b2d4f; font-size: 16px; font-weight: 800; margin-bottom: 16px;">Panel Owner</h4>
                <p style="font-size: 13px; color: #666; line-height: 1.6; margin-bottom: 32px; flex-grow: 1;">Halaman yang dapat diakses oleh pengguna dengan peran <strong>Owner</strong> untuk mengelola data yang menjadi tanggung jawabnya.</p>
                <a href="{{ route('owner') }}" style="display: flex; align-items: center; justify-content: center; gap: 8px; background: #bc920c; color: white; padding: 14px; border-radius: 8px; text-decoration: none; font-size: 14px; font-weight: 600;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    Masuk ke Panel Owner
                </a>
            </div>

            {{-- Dewasa Page --}}
            <div style="border: 1.5px solid #89c79a; border-radius: 12px; padding: 32px 24px 24px; text-align: center; background: #fcfefe; display: flex; flex-direction: column;">
                <div style="width: 64px; height: 64px; background: #e6f6eb; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="#1e8e3e" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </div>
                <h4 style="color: #1b2d4f; font-size: 16px; font-weight: 800; margin-bottom: 16px;">Area Pengguna Dewasa</h4>
                <p style="font-size: 13px; color: #666; line-height: 1.6; margin-bottom: 32px; flex-grow: 1;">Halaman ini hanya tersedia bagi pengguna yang telah memenuhi batas usia yang ditentukan.</p>
                <a href="{{ route('dewasa') }}" style="display: flex; align-items: center; justify-content: center; gap: 8px; background: #1a8f3b; color: white; padding: 14px; border-radius: 8px; text-decoration: none; font-size: 14px; font-weight: 600;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    Buka Halaman Dewasa
                </a>
            </div>
        </div>
    </div>
@endsection
