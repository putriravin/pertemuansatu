@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="card">
        <h2>Selamat Datang!</h2>
        <p>Ini adalah halaman utama dari website portfolio saya yang dibangun menggunakan framework Laravel.</p>
        <p class="text-muted" style="margin-top: 16px;">Gunakan navigasi di atas untuk melihat profil, pendidikan, dan keahlian saya.</p>
        
        <div style="margin-top: 24px;">
            <a href="{{ route('portfolio.profil') }}" class="btn">Lihat Profil Saya</a>
        </div>
    </div>
@endsection
