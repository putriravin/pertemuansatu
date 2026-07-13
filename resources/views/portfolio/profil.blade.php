@extends('layouts.app')

@section('title', $title)

@section('content')
    <h2>Profil Mahasiswa</h2>
    <hr>
    <p><strong>Nama Lengkap:</strong> {{ $nama }}</p>
    <p><strong>NPM:</strong> {{ $npm }}</p>
@endsection
