<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Portfolio</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f9; }
        header { background-color: #333; color: white; padding: 1rem; text-align: center; }
        nav { background-color: #444; overflow: hidden; }
        nav a { float: left; display: block; color: white; text-align: center; padding: 14px 20px; text-decoration: none; }
        nav a:hover { background-color: #ddd; color: black; }
        .container { padding: 20px; max-width: 800px; margin: 20px auto; background: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        footer { text-align: center; padding: 10px; background-color: #333; color: white; position: fixed; bottom: 0; width: 100%; }
        h1, h2 { color: #333; }
        ul { list-style-type: square; }
    </style>
</head>
<body>
    <header>
        <h1>Portfolio Website</h1>
    </header>
    
    <nav>
        <a href="{{ route('portfolio.home') }}">Home</a>
        <a href="{{ route('portfolio.profil') }}">Profil</a>
        <a href="{{ route('portfolio.pendidikan') }}">Pendidikan</a>
        <a href="{{ route('portfolio.keahlian') }}">Keahlian</a>
    </nav>
    
    <div class="container">
        @yield('content')
    </div>
    
    <footer>
        &copy; 2024 Portfolio - Putri Ravin Nauli
    </footer>
</body>
</html>
