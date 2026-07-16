@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="card" style="text-align: center; padding: 48px 32px;">
        <div style="width: 120px; height: 120px; margin: 0 auto 20px; border-radius: 50%; overflow: hidden; border: 4px solid #1b3a6b; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
            <img src="{{ asset('images/sample.jpeg') }}" alt="Profile Putri" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <h2 style="margin-bottom: 6px;">Putri Ravin Nauli</h2>
        <p class="text-secondary" style="margin-bottom: 20px;">Mahasiswa Teknik Informatika &mdash; Universitas Medan Area</p>
        <p style="max-width: 520px; margin: 0 auto 28px;">
            Halo, saya Putri Ravin Nauli, mahasiswa Semester 6 Program Studi Teknik Informatika Universitas Medan Area. Saya memiliki ketertarikan pada pengembangan aplikasi berbasis web, desain antarmuka, dan pemrograman. Melalui website ini, saya membagikan informasi mengenai profil, pendidikan, serta kemampuan yang saya miliki sebagai bekal untuk terus berkembang di dunia teknologi.
        </p>
        <div style="display: flex; gap: 12px; justify-content: center;">
            <a href="{{ route('portfolio.profil') }}" class="btn-primary">Lihat Profil Saya</a>
            <a href="{{ route('portfolio.pendidikan') }}" class="btn-primary" style="background-color: #3a6b1b; color: #fff;">Lihat Pendidikan</a>
            <a href="{{ route('portfolio.keahlian') }}" class="btn-primary" style="background-color: #f0c040; color: #1b3a6b;">Lihat Keahlian Saya</a>
        </div>
    </div>

    <div class="card">
        <p class="card-title">Tentang Website Ini</p>
        <p>
           Website portfolio ini dibangun menggunakan framework <strong>Laravel</strong> sebagai bagian dari
           tugas modul 3 Praktikum Web II. Materi yang dipelajari pada modul ini meliputi
           penggunaan <em>Blade Templating Engine</em>, pembuatan layout dengan <code>@@extends</code>
           dan <code>@@section</code>, serta pengiriman data dari controller ke view menggunakan
           fungsi <code>compact()</code>.
        </p>
    </div>

@endsection
