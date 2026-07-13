@extends('layouts.app')

@section('title', 'Pendidikan')

@section('content')

    <div class="card">
        <p class="card-title">Riwayat Pendidikan</p>

        <div style="display: flex; gap: 20px; align-items: flex-start; padding: 12px 0;">
            <div style="flex-shrink: 0; width: 50px; height: 50px; background-color: #dce8ff; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                <span style="font-size: 22px;">🎓</span>
            </div>
            <div>
                <p style="font-weight: 600; font-size: 15px; color: #1b2d4f; margin-bottom: 2px;">{{ $kampus }}</p>
                <p style="font-size: 13px; color: #444; margin-bottom: 2px;">Sarjana (S1) &mdash; {{ $prodi }}</p>
                <p class="text-secondary">2023 &ndash; Sekarang</p>
            </div>
        </div>

        <hr class="divider">

        <div style="display: flex; gap: 20px; align-items: flex-start; padding: 12px 0;">
            <div style="flex-shrink: 0; width: 50px; height: 50px; background-color: #dce8ff; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                <span style="font-size: 22px;">🏫</span>
            </div>
            <div>
                <p style="font-weight: 600; font-size: 15px; color: #1b2d4f; margin-bottom: 2px;">SMAN / SMK Sederajat</p>
                <p style="font-size: 13px; color: #444; margin-bottom: 2px;">Sekolah Menengah Atas</p>
                <p class="text-secondary">Lulus 2023</p>
            </div>
        </div>
    </div>

    <div class="card">
        <p class="card-title">Mata Kuliah yang Sedang Diikuti</p>
        <ul style="padding-left: 20px; font-size: 14px; color: #444; line-height: 2;">
            <li>Praktikum Aplikasi Berbasis Web II</li>
            <li>Algoritma dan Pemrograman</li>
            <li>Basis Data</li>
            <li>Jaringan Komputer</li>
        </ul>
    </div>

@endsection
