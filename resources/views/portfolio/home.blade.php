@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="card" style="text-align: center; padding: 48px 32px;">
        <div style="width: 80px; height: 80px; background-color: #1b3a6b; border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
            <span style="color: white; font-size: 32px; font-weight: 700;">P</span>
        </div>
        <h2 style="margin-bottom: 6px;">Putri Ravin Nauli</h2>
        <p class="text-secondary" style="margin-bottom: 20px;">Mahasiswa Teknik Informatika &mdash; Universitas Medan Area</p>
        <p style="max-width: 520px; margin: 0 auto 28px;">
            Halo, saya Putri. Website ini dibuat dalam rangka tugas praktikum mata kuliah
            Aplikasi Berbasis Web II. Di sini saya menampilkan profil singkat, riwayat
            pendidikan, dan keahlian yang saya miliki sebagai mahasiswa semester 3.
        </p>
        <a href="{{ route('portfolio.profil') }}" class="btn-primary">Lihat Profil Saya</a>
    </div>

    <div class="card">
        <p class="card-title">Tentang Website Ini</p>
        <p>
            Website ini dibangun menggunakan framework <strong>Laravel</strong> sebagai bagian dari
            tugas modul 3 Praktikum Web II. Materi yang dipelajari pada modul ini meliputi
            penggunaan <em>Blade Templating Engine</em>, pembuatan layout dengan <code>@extends</code>
            dan <code>@section</code>, serta pengiriman data dari controller ke view menggunakan
            fungsi <code>compact()</code>.
        </p>
    </div>

@endsection
