@extends('layouts.app')

@section('title', 'Keahlian')

@section('content')

<div class="card">
    <p class="card-title">Bidang Keahlian</p>

    <p style="margin-bottom:20px;">
        Berikut merupakan beberapa bidang keahlian yang sedang saya pelajari dan
        kembangkan dalam pengembangan aplikasi berbasis web menggunakan framework
        Laravel.
    </p>

    <div style="display: flex; flex-wrap: wrap; gap: 10px;">
        @foreach($skills as $skill)
            <span style="
                background-color: #edf2ff;
                color: #1b3a6b;
                border: 1px solid #c5d5f5;
                padding: 6px 18px;
                border-radius: 20px;
                font-size: 13px;
                font-weight: 600;
            ">
                {{ $skill }}
            </span>
        @endforeach
    </div>
</div>

<div class="card">
    <p class="card-title">Tentang Keahlian</p>

    <p>
        Keahlian yang ditampilkan merupakan kemampuan yang saya pelajari melalui
        perkuliahan, praktikum, serta pengembangan proyek. Saya terus meningkatkan
        pemahaman dan keterampilan dalam membangun aplikasi web dengan menerapkan
        praktik pengembangan yang baik serta memanfaatkan dokumentasi resmi dan
        berbagai sumber pembelajaran lainnya.
    </p>
</div>

@endsection