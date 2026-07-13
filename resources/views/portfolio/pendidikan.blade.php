@extends('layouts.app')

@section('title', 'Pendidikan')

@section('content')

    <div class="card">
        <p class="card-title">Status Pendidikan</p>

        <div style="display: flex; gap: 20px; align-items: flex-start; padding: 12px 0;">
            <div style="flex-shrink: 0; width: 50px; height: 50px; background-color: #dce8ff; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                <span style="font-size: 22px;">🎓</span>
            </div>
            <div>
                <p style="font-weight: 600; font-size: 15px; color: #1b2d4f; margin-bottom: 2px;">Status: Mahasiswa Aktif</p>
                <p style="font-size: 13px; color: #444; margin-bottom: 2px;">Sedang menempuh pendidikan tingkat Sarjana (S1)</p>
            </div>
        </div>

    </div>

@endsection

