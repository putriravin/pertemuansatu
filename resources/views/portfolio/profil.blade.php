@extends('layouts.app')

@section('title', 'Profil')

@section('content')

    <div class="card">
        <div style="display: flex; align-items: center; gap: 24px; flex-wrap: wrap;">
            <div style="width: 90px; height: 90px; background-color: #1b3a6b; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <span style="color: white; font-size: 36px; font-weight: 700;">{{ substr($nama, 0, 1) }}</span>
            </div>
            <div>
                <h2 style="margin-bottom: 4px;">{{ $nama }}</h2>
                <p class="text-secondary" style="margin-bottom: 8px;">Mahasiswa Aktif &mdash; Teknik Informatika, Universitas Medan Area</p>
                <span style="background: #e8f0fe; color: #1b3a6b; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 20px;">NPM: {{ $npm }}</span>
            </div>
        </div>
    </div>

    <div class="card">
        <p class="card-title">Data Diri</p>
        <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
            <tr style="border-bottom: 1px solid #f0f0f0;">
                <td style="padding: 10px 0; color: #777; width: 160px;">Nama Lengkap</td>
                <td style="padding: 10px 0; font-weight: 500;">{{ $nama }}</td>
            </tr>
            <tr style="border-bottom: 1px solid #f0f0f0;">
                <td style="padding: 10px 0; color: #777;">NPM</td>
                <td style="padding: 10px 0; font-weight: 500;">{{ $npm }}</td>
            </tr>
            <tr style="border-bottom: 1px solid #f0f0f0;">
                <td style="padding: 10px 0; color: #777;">Alamat</td>
                <td style="padding: 10px 0; font-weight: 500;">Jl. Pancing, Sekitar Universitas Medan Area</td>
            </tr>
            <tr style="border-bottom: 1px solid #f0f0f0;">
                <td style="padding: 10px 0; color: #777;">Program Studi</td>
                <td style="padding: 10px 0; font-weight: 500;">Teknik Informatika</td>
            </tr>
            <tr>
                <td style="padding: 10px 0; color: #777;">Universitas</td>
                <td style="padding: 10px 0; font-weight: 500;">Universitas Medan Area</td>
            </tr>
        </table>
    </div>

    <div class="card">
        <p class="card-title">Tentang Saya</p>
        <p>
            Nama saya Putri Ravin Nauli, saya adalah mahasiswa aktif semester 3 di program studi
            Teknik Informatika, Fakultas Teknik, Universitas Medan Area. Saat ini saya sedang
            menjalani perkuliahan dan salah satu mata kuliah yang saya ikuti adalah Praktikum
            Aplikasi Berbasis Web II.
        </p>
        <p style="margin-top: 12px;">
            Melalui mata kuliah ini saya belajar banyak hal baru terutama tentang framework Laravel.
            Website portfolio ini saya buat sebagai bagian dari tugas modul 3 yang membahas
            tentang <em>View</em> dan <em>Blade Templating</em> di Laravel.
        </p>
    </div>

@endsection
