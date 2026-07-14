@extends('layouts.app')

@section('title', 'Owner Dashboard')

@section('content')
    <div class="card">
        <h2 style="margin-bottom: 6px; color: #1b2d4f;">Owner Dashboard</h2>
        <p class="text-secondary" style="margin-bottom: 24px;">Welcome to Owner Dashboard, {{ Auth::user()->name }}</p>

        <div style="padding: 24px; background: #fdf5e6; border-radius: 8px; border: 1px solid #f8e5c6;">
            <p style="margin-bottom: 10px;">Informasi Pengguna Saat Ini:</p>
            <ul style="list-style: none; padding: 0;">
                <li><strong>Nama:</strong> {{ Auth::user()->name }}</li>
                <li><strong>Role:</strong> <span style="background: #f0c040; color: #fff; padding: 2px 8px; border-radius: 12px; font-size: 12px; font-weight: bold;">{{ Auth::user()->role }}</span></li>
            </ul>
        </div>
        
        <div style="margin-top: 24px;">
            <a href="{{ route('dashboard') }}" class="btn-primary" style="padding: 10px 20px;">Kembali ke Dashboard</a>
        </div>
    </div>
@endsection
