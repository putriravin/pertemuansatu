<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Portfolio Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #eef0f5;
            color: #2d2d2d;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: #1b3a6b;
            padding: 0 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 60px;
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        .navbar-brand {
            color: #ffffff;
            font-size: 18px;
            font-weight: 700;
            text-decoration: none;
            letter-spacing: 0.5px;
        }
        .navbar-brand span {
            color: #f0c040;
        }

        .navbar-menu {
            display: flex;
            gap: 4px;
            list-style: none;
        }

        .navbar-menu a {
            color: #ccdaf0;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 6px;
            transition: background 0.2s, color 0.2s;
        }

        .navbar-menu a:hover {
            background-color: rgba(255,255,255,0.12);
            color: #ffffff;
        }

        /* ===== LAYOUT ===== */
        .wrapper {
            max-width: 860px;
            margin: 32px auto;
            padding: 0 20px 60px;
        }

        /* ===== CARD ===== */
        .card {
            background: #ffffff;
            border-radius: 12px;
            padding: 28px 32px;
            margin-bottom: 20px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.08);
            border: 1px solid #dde2ee;
        }

        .card-title {
            font-size: 16px;
            font-weight: 600;
            color: #1b3a6b;
            margin-bottom: 16px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eef0f5;
        }

        /* ===== TYPOGRAPHY ===== */
        p {
            font-size: 14px;
            line-height: 1.7;
            color: #444;
        }

        h2 {
            font-size: 22px;
            font-weight: 700;
            color: #1b2d4f;
        }

        .text-secondary {
            color: #777;
            font-size: 13px;
        }

        /* ===== DIVIDER ===== */
        .divider {
            border: none;
            border-top: 1px solid #eef0f5;
            margin: 20px 0;
        }

        /* ===== BUTTON ===== */
        .btn-primary {
            background-color: #1b3a6b;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 9px 22px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background 0.2s;
        }
        .btn-primary:hover {
            background-color: #142d54;
        }

        /* ===== FOOTER ===== */
        footer {
            text-align: center;
            color: #999;
            font-size: 12px;
            padding: 20px;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ route('portfolio.home') }}" class="navbar-brand" style="display: flex; align-items: center; gap: 10px;">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="#f0c040"/>
                <path d="M2 17L12 22L22 17" stroke="#f0c040" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M2 12L12 17L22 12" stroke="#f0c040" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Portfolio
        </a>
        <ul class="navbar-menu">
            <li><a href="{{ route('portfolio.home') }}">Home</a></li>
            <li><a href="{{ route('portfolio.profil') }}">Profil</a></li>
            <li style="margin-left: 10px; border-left: 1px solid rgba(255,255,255,0.2); padding-left: 10px;">
                <a href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
            </li>
            <li><a href="{{ route('nilai.index') }}">Data Nilai</a></li>
            <li style="margin-left: 10px; border-left: 1px solid rgba(255,255,255,0.2); padding-left: 10px;">
                <a href="{{ route('produk.data') }}">Bootcamp</a>
            </li>
            <li><a href="{{ route('upload.form') }}">Upload</a></li>
            <li style="margin-left: 10px; border-left: 1px solid rgba(255,255,255,0.2); padding-left: 10px;">
                @guest
                    <a href="{{ route('login') }}" style="background: rgba(255,255,255,0.2); padding: 4px 12px; border-radius: 20px;">Login</a>
                @else
                    <a href="{{ route('dashboard') }}" style="background: rgba(255,255,255,0.2); padding: 4px 12px; border-radius: 20px; font-weight: bold;">{{ Auth::user()->name ?: Auth::user()->email }}</a>
                    <a href="{{ route('logout') }}" style="margin-left: 8px;">Logout</a>
                @endguest
            </li>
        </ul>
    </nav>

    <div class="wrapper">
        @yield('content')
    </div>

    <footer>
        &copy; {{ date('Y') }} Putri Ravin Nauli &mdash; Praktikum Web II, Teknik Informatika UMA
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    @include('sweetalert::alert')
    @stack('scripts')
</body>
</html>
