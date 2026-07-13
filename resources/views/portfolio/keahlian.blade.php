@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="card">
        <h2>Keahlian (Skills)</h2>
        <p class="text-muted">Keahlian yang didapatkan melalui perkuliahan dan belajar mandiri.</p>
        
        <div style="margin-top: 24px; display: flex; flex-wrap: wrap; gap: 12px;">
            @foreach($skills as $skill)
                <div style="display: flex; align-items: center; gap: 8px; border: 1px solid #e0dfdc; padding: 8px 16px; border-radius: 20px; background-color: white;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#0a66c2"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                    <span style="font-weight: 600; font-size: 14px;">{{ $skill }}</span>
                </div>
            @endforeach
        </div>
        
        <hr>
        <h3 style="font-size: 16px;">Endorsements</h3>
        <p class="text-muted">Belum ada endorsement.</p>
    </div>
@endsection
