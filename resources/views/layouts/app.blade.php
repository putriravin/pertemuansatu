<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | LinkedIn Style Portfolio</title>
    <style>
        /* Base LinkedIn Styles */
        body { 
            font-family: -apple-system, system-ui, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', 'Fira Sans', Ubuntu, Oxygen, 'Oxygen Sans', Cantarell, sans-serif; 
            margin: 0; 
            padding: 0; 
            background-color: #f3f2ef; /* LinkedIn background color */
            color: #000000e6;
        }
        
        /* Navbar */
        nav { 
            background-color: #ffffff; 
            border-bottom: 1px solid #e0dfdc;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .nav-container {
            max-width: 1128px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            padding: 0 20px;
        }
        .nav-logo {
            font-size: 24px;
            font-weight: bold;
            color: #0a66c2; /* LinkedIn Blue */
            text-decoration: none;
            margin-right: 40px;
        }
        .nav-links {
            display: flex;
            gap: 5px;
        }
        .nav-links a { 
            color: #666666; 
            text-align: center; 
            padding: 15px 20px; 
            text-decoration: none; 
            font-size: 14px;
            font-weight: 500;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-bottom: 2px solid transparent;
        }
        .nav-links a:hover, .nav-links a.active { 
            color: #191919; 
            border-bottom: 2px solid #191919;
        }

        /* Main Container */
        .container { 
            max-width: 800px; 
            margin: 25px auto; 
            padding: 0 20px;
            padding-bottom: 60px;
        }

        /* LinkedIn Card Style */
        .card {
            background: #ffffff; 
            border-radius: 8px; 
            border: 1px solid #e0dfdc;
            padding: 24px;
            margin-bottom: 16px;
        }
        
        /* Typography */
        h1, h2 { color: #000000e6; margin-top: 0; }
        h2 { font-size: 20px; font-weight: 600; }
        p { color: #000000e6; line-height: 1.5; font-size: 14px; }
        
        .text-muted { color: #00000099; }
        .text-blue { color: #0a66c2; font-weight: 600; }
        
        /* Footer */
        footer { 
            text-align: center; 
            padding: 15px; 
            color: #00000099; 
            font-size: 12px;
        }
        
        /* Divider */
        hr { border: 0; border-top: 1px solid #e0dfdc; margin: 16px 0; }
        
        /* Button */
        .btn {
            background-color: #0a66c2;
            color: white;
            border: none;
            border-radius: 24px;
            padding: 6px 16px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .btn:hover { background-color: #004182; }
    </style>
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="{{ route('portfolio.home') }}" class="nav-logo">in</a>
            <div class="nav-links">
                <a href="{{ route('portfolio.home') }}">Home</a>
                <a href="{{ route('portfolio.profil') }}">Profil</a>
                <a href="{{ route('portfolio.pendidikan') }}">Pendidikan</a>
                <a href="{{ route('portfolio.keahlian') }}">Keahlian</a>
            </div>
        </div>
    </nav>
    
    <div class="container">
        @yield('content')
    </div>
    
    <footer>
        LinkedIn Clone Portfolio &copy; {{ date('Y') }} - Putri Ravin Nauli
    </footer>
</body>
</html>
