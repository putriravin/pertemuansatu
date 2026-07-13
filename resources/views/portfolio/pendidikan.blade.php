@extends('layouts.app')

@section('title', $title)

@section('content')
    <h2>Riwayat Pendidikan</h2>
    <hr>
    <p><strong>Perguruan Tinggi:</strong> {{ $kampus }}</p>
    <p><strong>Program Studi:</strong> {{ $prodi }}</p>
@endsection
