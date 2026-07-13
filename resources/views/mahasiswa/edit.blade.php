@extends('layouts.app')

@section('title', 'Edit Mahasiswa')

@section('content')
    <div class="card">
        <h2 style="margin-bottom: 6px; color: #1b2d4f;">Edit Data Mahasiswa</h2>
        <p class="text-secondary" style="margin-bottom: 24px;">Lakukan perubahan data mahasiswa pada form di bawah ini.</p>

        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('mahasiswa._form')
            
            <div style="display: flex; gap: 12px; margin-top: 10px;">
                <button type="submit" class="btn-primary" style="padding: 10px 24px; background-color: #f0c040; color: white;">Update Data</button>
                <a href="{{ route('mahasiswa.index') }}" style="background: #eef0f5; color: #444; padding: 10px 24px; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: 600;">Batal</a>
            </div>
        </form>
    </div>
@endsection
