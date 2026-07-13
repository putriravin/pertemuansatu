@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="card" style="display: flex; gap: 20px; align-items: flex-start;">
        <div style="width: 100px; height: 100px; background-color: #0a66c2; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 36px; font-weight: bold;">
            {{ substr($nama, 0, 1) }}
        </div>
        <div>
            <h2 style="font-size: 24px; margin-bottom: 4px;">{{ $nama }}</h2>
            <p class="text-muted" style="margin-top: 0; margin-bottom: 16px;">Mahasiswa Teknik Informatika &bull; Universitas Medan Area</p>
            
            <p style="margin-bottom: 8px;"><strong>NPM:</strong> <span class="text-blue">{{ $npm }}</span></p>
            <p style="margin-bottom: 24px;">Mahasiswa aktif program studi Teknik Informatika angkatan 2023.</p>
            
            <a href="#" class="btn">Connect</a>
        </div>
    </div>
    
    <div class="card">
        <h2>About</h2>
        <p>Halo! Saya adalah mahasiswa Teknik Informatika di Universitas Medan Area. Saat ini saya sedang mempelajari pengembangan aplikasi web menggunakan framework Laravel, HTML, CSS, dan PHP. Saya memiliki minat besar di bidang Software Engineering dan terus belajar untuk meningkatkan kemampuan pemrograman saya.</p>
    </div>
@endsection
