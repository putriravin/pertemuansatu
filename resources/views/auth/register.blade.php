@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div style="max-width: 500px; margin: 40px auto;">
        <div class="card">
            <h2 style="margin-bottom: 6px; color: #1b2d4f; text-align: center;">Register</h2>
            <p class="text-secondary" style="margin-bottom: 24px; text-align: center;">Buat akun baru Anda</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div style="margin-bottom: 16px;">
                    <label for="name" style="display: block; font-size: 13px; font-weight: 600; color: #1b3a6b; margin-bottom: 6px;">Name:</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus style="width: 100%; padding: 10px 14px; border: 1px solid #d0daf0; border-radius: 8px; font-size: 14px; font-family: inherit; outline: none;">
                    @error('name') <span style="color: #d93025; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span> @enderror
                </div>

                <div style="margin-bottom: 16px;">
                    <label for="email" style="display: block; font-size: 13px; font-weight: 600; color: #1b3a6b; margin-bottom: 6px;">Email Address:</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 10px 14px; border: 1px solid #d0daf0; border-radius: 8px; font-size: 14px; font-family: inherit; outline: none;">
                    @error('email') <span style="color: #d93025; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span> @enderror
                </div>

                <div style="margin-bottom: 16px;">
                    <label for="password" style="display: block; font-size: 13px; font-weight: 600; color: #1b3a6b; margin-bottom: 6px;">Password:</label>
                    <input id="password" type="password" name="password" required style="width: 100%; padding: 10px 14px; border: 1px solid #d0daf0; border-radius: 8px; font-size: 14px; font-family: inherit; outline: none;">
                    @error('password') <span style="color: #d93025; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span> @enderror
                </div>

                <div style="margin-bottom: 24px;">
                    <label for="password-confirm" style="display: block; font-size: 13px; font-weight: 600; color: #1b3a6b; margin-bottom: 6px;">Confirm Password:</label>
                    <input id="password-confirm" type="password" name="password_confirmation" required style="width: 100%; padding: 10px 14px; border: 1px solid #d0daf0; border-radius: 8px; font-size: 14px; font-family: inherit; outline: none;">
                </div>

                <div style="margin-bottom: 24px; text-align: center;">
                    <button type="submit" class="btn-primary" style="width: 100%; padding: 12px;">Register</button>
                </div>
                
                <div style="text-align: center; font-size: 14px;">
                    <a href="{{ route('login') }}" style="color: #1b3a6b; text-decoration: none;">Sudah punya akun? Login di sini</a>
                </div>
            </form>
        </div>
    </div>
@endsection
