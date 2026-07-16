@extends('layouts.app')

@section('title', 'Pendidikan')

@section('content')

    {{-- Header Card --}}
    <div class="card" style="background: linear-gradient(135deg, #1b3a6b 0%, #2a5298 100%); color: white; text-align: center; padding: 36px 32px;">
        <p style="font-size: 13px; color: #ccdaf0; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;">Riwayat Pendidikan</p>
        <h2 style="color: white; font-size: 24px; margin-bottom: 4px;">{{ $kampus }}</h2>
        <p style="color: #ccdaf0; font-size: 14px; margin: 0;">Fakultas Teknik &mdash; {{ $prodi }}</p>
    </div>

    {{-- Info Cards --}}
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 20px;">

        <div class="card" style="margin-bottom: 0; display: flex; align-items: center; gap: 16px;">
            <img src="{{ asset('images/icon_jenjang.png') }}" alt="Jenjang" style="width: 52px; height: 52px; border-radius: 10px; object-fit: cover; flex-shrink: 0;">
            <div>
                <p style="font-size: 11px; color: #999; margin-bottom: 3px; text-transform: uppercase; letter-spacing: 0.5px;">Jenjang Pendidikan</p>
                <p style="font-weight: 700; font-size: 15px; color: #1b2d4f; margin: 0;">S1 (Sarjana)</p>
            </div>
        </div>

        <div class="card" style="margin-bottom: 0; display: flex; align-items: center; gap: 16px;">
            <img src="{{ asset('images/icon_kampus.png') }}" alt="Kampus" style="width: 52px; height: 52px; border-radius: 10px; object-fit: cover; flex-shrink: 0;">
            <div>
                <p style="font-size: 11px; color: #999; margin-bottom: 3px; text-transform: uppercase; letter-spacing: 0.5px;">Perguruan Tinggi</p>
                <p style="font-weight: 700; font-size: 14px; color: #1b2d4f; margin: 0;">{{ $kampus }}</p>
            </div>
        </div>

        <div class="card" style="margin-bottom: 0; display: flex; align-items: center; gap: 16px;">
            <img src="{{ asset('images/icon_prodi.png') }}" alt="Prodi" style="width: 52px; height: 52px; border-radius: 10px; object-fit: cover; flex-shrink: 0;">
            <div>
                <p style="font-size: 11px; color: #999; margin-bottom: 3px; text-transform: uppercase; letter-spacing: 0.5px;">Program Studi</p>
                <p style="font-weight: 700; font-size: 15px; color: #1b2d4f; margin: 0;">{{ $prodi }}</p>
            </div>
        </div>

        <div class="card" style="margin-bottom: 0; display: flex; align-items: center; gap: 16px;">
            <img src="{{ asset('images/icon_matakuliah.png') }}" alt="Matakuliah" style="width: 52px; height: 52px; border-radius: 10px; object-fit: cover; flex-shrink: 0;">
            <div>
                <p style="font-size: 11px; color: #999; margin-bottom: 3px; text-transform: uppercase; letter-spacing: 0.5px;">Mata Kuliah</p>
                <p style="font-weight: 700; font-size: 14px; color: #1b2d4f; margin: 0;">{{ $matakuliah }}</p>
            </div>
        </div>

    </div>

    {{-- Detail Pendidikan --}}
    <div class="card">
        <p class="card-title">Detail Status Pendidikan</p>
        <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
            <tr style="border-bottom: 1px solid #f0f0f0;">
                <td style="padding: 12px 0; color: #777; width: 200px;">Nama Institusi</td>
                <td style="padding: 12px 0; font-weight: 600; color: #1b2d4f;">{{ $kampus }}</td>
            </tr>
            <tr style="border-bottom: 1px solid #f0f0f0;">
                <td style="padding: 12px 0; color: #777;">Fakultas</td>
                <td style="padding: 12px 0; font-weight: 600; color: #1b2d4f;">Fakultas Teknik</td>
            </tr>
            <tr style="border-bottom: 1px solid #f0f0f0;">
                <td style="padding: 12px 0; color: #777;">Program Studi</td>
                <td style="padding: 12px 0; font-weight: 600; color: #1b2d4f;">{{ $prodi }}</td>
            </tr>
            <tr style="border-bottom: 1px solid #f0f0f0;">
                <td style="padding: 12px 0; color: #777;">Jenjang</td>
                <td style="padding: 12px 0; font-weight: 600; color: #1b2d4f;">Strata Satu (S1)</td>
            </tr>
            <tr style="border-bottom: 1px solid #f0f0f0;">
                <td style="padding: 12px 0; color: #777;">Semester Aktif</td>
                <td style="padding: 12px 0; font-weight: 600; color: #1b2d4f;">Semester 6 (Genap)</td>
            </tr>
            <tr style="border-bottom: 1px solid #f0f0f0;">
                <td style="padding: 12px 0; color: #777;">Tahun Masuk</td>
                <td style="padding: 12px 0; font-weight: 600; color: #1b2d4f;">2023</td>
            </tr>
            <tr style="border-bottom: 1px solid #f0f0f0;">
                <td style="padding: 12px 0; color: #777;">Mata Kuliah Diambil</td>
                <td style="padding: 12px 0; font-weight: 600; color: #1b2d4f;">{{ $matakuliah }}</td>
            </tr>
            <tr>
                <td style="padding: 12px 0; color: #777;">Status Mahasiswa</td>
                <td style="padding: 12px 0;">
                    <span style="background: #e6f4ea; color: #1e8e3e; font-size: 12px; font-weight: 700; padding: 4px 14px; border-radius: 20px;">Aktif</span>
                </td>
            </tr>
        </table>
    </div>

@endsection
