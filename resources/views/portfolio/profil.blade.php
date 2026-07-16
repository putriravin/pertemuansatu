@extends('layouts.app')

@section('title', 'Profil')

@section('content')

    <div class="card">
        <div style="display: flex; align-items: center; gap: 24px; flex-wrap: wrap;">
            <div style="width: 100px; height: 100px; margin-right: 10px; border-radius: 50%; overflow: hidden; border: 3px solid #1b3a6b; flex-shrink: 0;">
                <img src="{{ asset('images/sample.jpeg') }}" alt="Profile Putri" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div>
                <h2 style="margin-bottom: 4px;">{{ $nama }}</h2>
                <span style="background: #e8f0fe; color: #1b3a6b; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 20px;">NPM: {{ $npm }}</span>
            </div>
        </div>
    </div>

    <div class="card">
        <p class="card-title">Data Diri Singkat</p>
        <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
            <tr style="border-bottom: 1px solid #f0f0f0;">
                <td style="padding: 10px 0; color: #777; width: 160px;">Nama Lengkap</td>
                <td style="padding: 10px 0; font-weight: 500;">{{ $nama }}</td>
            </tr>
            <tr style="border-bottom: 1px solid #f0f0f0;">
                <td style="padding: 10px 0; color: #777;">NPM</td>
                <td style="padding: 10px 0; font-weight: 500;">{{ $npm }}</td>
            </tr>
            <tr>
                <td style="padding: 10px 0; color: #777;">Status</td>
                <td style="padding: 10px 0; font-weight: 500;">Mahasiswa Aktif</td>
            </tr>
        </table>
    </div>

@endsection

