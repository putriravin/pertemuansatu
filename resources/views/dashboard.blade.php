@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card">
        @if(session('success'))
            <div style="background-color: #e6f4ea; color: #1e8e3e; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                {{ session('success') }}
            </div>
        @endif
        
        <h2 style="margin-bottom: 6px; color: #1b2d4f;">Halaman Dashboard</h2>
        <p class="text-secondary" style="margin-bottom: 24px;">Welcome, {{ auth()->user()->email }}</p>

        <div style="padding: 24px; background: #f8fafe; border-radius: 8px; border: 1px solid #d0daf0;">
            <p>Anda telah berhasil login. Selamat datang di sistem akademik!</p>
        </div>
    </div>
@endsection
