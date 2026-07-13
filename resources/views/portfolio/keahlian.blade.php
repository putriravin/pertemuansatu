@extends('layouts.app')

@section('title', $title)

@section('content')
    <h2>Keahlian (Skills)</h2>
    <hr>
    <p>Berikut adalah daftar keahlian yang saya miliki:</p>
    <ul>
        @foreach($skills as $skill)
            <li>{{ $skill }}</li>
        @endforeach
    </ul>
@endsection
