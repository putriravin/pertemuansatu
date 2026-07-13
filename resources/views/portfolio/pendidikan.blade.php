@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="card">
        <h2>Riwayat Pendidikan</h2>
        
        <div style="display: flex; gap: 16px; margin-top: 24px;">
            <div style="width: 56px; height: 56px; background-color: #f3f2ef; border-radius: 4px; display: flex; align-items: center; justify-content: center;">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="#666666"><path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2.81-1.53V17h2V8.29L12 3zm6.68 11.14L12 17.77l-6.68-3.63V12.1l6.68 3.63 6.68-3.63v2.04zM12 13.52L3.13 8.68 12 4.09l8.87 4.59L12 13.52z"/></svg>
            </div>
            <div>
                <h3 style="margin: 0; font-size: 16px; color: #000000e6;">{{ $kampus }}</h3>
                <p style="margin: 4px 0 0 0; color: #000000e6;">Sarjana (S1), {{ $prodi }}</p>
                <p class="text-muted" style="margin: 4px 0;">2023 - Sekarang</p>
            </div>
        </div>
        
        <hr>
        
        <div style="display: flex; gap: 16px;">
            <div style="width: 56px; height: 56px; background-color: #f3f2ef; border-radius: 4px; display: flex; align-items: center; justify-content: center;">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="#666666"><path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2.81-1.53V17h2V8.29L12 3zm6.68 11.14L12 17.77l-6.68-3.63V12.1l6.68 3.63 6.68-3.63v2.04zM12 13.52L3.13 8.68 12 4.09l8.87 4.59L12 13.52z"/></svg>
            </div>
            <div>
                <h3 style="margin: 0; font-size: 16px; color: #000000e6;">SMA / SMK Negeri</h3>
                <p style="margin: 4px 0 0 0; color: #000000e6;">Sekolah Menengah Atas</p>
                <p class="text-muted" style="margin: 4px 0;">Lulus tahun 2023</p>
            </div>
        </div>
    </div>
@endsection
