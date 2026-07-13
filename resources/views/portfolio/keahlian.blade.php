@extends('layouts.app')

@section('title', 'Keahlian')

@section('content')

    <div class="card">
        <p class="card-title">Keahlian (Skills)</p>
        <p style="margin-bottom: 20px;">
            Berikut adalah keahlian yang sudah saya pelajari selama perkuliahan
            maupun dari belajar mandiri di luar kelas.
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
                ">{{ $skill }}</span>
            @endforeach
        </div>
    </div>

    <div class="card">
        <p class="card-title">Catatan</p>
        <p>
            Keahlian di atas masih dalam tahap belajar dan terus saya kembangkan.
            Saya menyadari masih banyak hal yang perlu dipelajari, dan saya terus
            berusaha meningkatkan kemampuan saya baik melalui perkuliahan maupun
            dari sumber belajar mandiri seperti YouTube dan dokumentasi resmi Laravel.
        </p>
    </div>

@endsection
