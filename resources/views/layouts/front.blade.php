<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Pendaftaran Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary: #5c33f0;
            --primary-dark: #4a27c9;
            --primary-light: #7c5cff;
            --secondary: #64748b;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --light: #f8fafc;
            --dark: #1e293b;
            --border: #e2e8f0;
        }

        body {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            color: var(--dark);
            line-height: 1.6;
        }

        /* Navbar */
        .navbar-custom {
            background: white;
            padding: 15px 0;
            box-shadow: 0 2px 15px rgba(92, 51, 240, 0.08);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .navbar-brand-custom {
            font-weight: 700;
            font-size: 22px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand-custom i {
            color: var(--primary);
            -webkit-text-fill-color: unset;
        }

        .nav-link-custom {
            color: var(--dark) !important;
            font-weight: 500;
            margin: 0 15px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link-custom:hover {
            color: var(--primary) !important;
        }

        .nav-link-custom.active {
            color: var(--primary) !important;
        }

        .nav-link-custom.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--primary-light) 100%);
            border-radius: 3px;
        }

        .btn-login-custom {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border: none;
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn-login-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(92, 51, 240, 0.3);
            color: white;
        }

        /* Header Hero */
        .hero-section {
            padding: 60px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(92, 51, 240, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            top: -200px;
            right: -200px;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(92, 51, 240, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            bottom: -150px;
            left: -150px;
        }

        .hero-title {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--dark);
            position: relative;
            z-index: 1;
        }

        .hero-title-gradient {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 18px;
            color: var(--secondary);
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            position: relative;
            z-index: 1;
            flex-wrap: wrap;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border: none;
            padding: 14px 40px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 30px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(92, 51, 240, 0.3);
            color: white;
        }

        .btn-secondary-custom {
            background: white;
            color: var(--primary);
            border: 2px solid var(--primary);
            padding: 12px 40px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 30px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary-custom:hover {
            transform: translateY(-5px);
            background: var(--primary);
            color: white;
            box-shadow: 0 15px 40px rgba(92, 51, 240, 0.2);
        }

        /* Content Container */
        .content-wrapper {
            min-height: calc(100vh - 200px);
            padding: 40px 0;
            position: relative;
            z-index: 2;
        }

        /* Footer */
        .footer-custom {
            background: linear-gradient(135deg, var(--dark) 0%, #334155 100%);
            color: white;
            padding: 40px 0 20px;
            margin-top: 60px;
            text-align: center;
        }

        .footer-custom a {
            color: var(--primary-light);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-custom a:hover {
            color: white;
            text-decoration: underline;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
        }

        .footer-links a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out;
        }

        .animate-slideInDown {
            animation: slideInDown 0.5s ease-out;
        }

        /* Cards */
        .card-modern {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(92, 51, 240, 0.08);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card-modern:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(92, 51, 240, 0.15);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 36px;
            }

            .hero-subtitle {
                font-size: 16px;
            }

            .nav-link-custom {
                margin: 10px 0;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .btn-primary-custom,
            .btn-secondary-custom {
                width: 100%;
            }

            .footer-links {
                flex-direction: column;
                gap: 15px;
            }
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }
    </style>

    @stack('css')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom animate-slideInDown">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand navbar-brand-custom">
                <i class="fas fa-graduation-cap"></i>
                <span>Pendaftaran Siswa</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ url('/index') }}" class="nav-link-custom @if(request()->path() == 'index') active @endif">
                            <i class="fas fa-home"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/about') }}" class="nav-link-custom @if(request()->path() == 'about') active @endif">
                            <i class="fas fa-info-circle"></i> Tentang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/homepage') }}" class="nav-link-custom @if(request()->path() == 'homepage') active @endif">
                            <i class="fas fa-file-alt"></i> Pendaftaran
                        </a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="{{ url('/login') }}" class="btn btn-login-custom">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    @if(request()->path() == 'index' || request()->path() == '/')
    <section class="hero-section animate-fadeInUp">
        <div class="container">
            <h1 class="hero-title">
                Selamat Datang di <span class="hero-title-gradient">Platform Pendaftaran</span>
            </h1>
            <p class="hero-subtitle">
                Daftar siswa baru dengan mudah dan cepat. Nikmati proses pendaftaran yang transparan dan efisien.
            </p>
            <div class="hero-buttons">
                <a href="{{ url('/homepage') }}" class="btn-primary-custom">
                    <i class="fas fa-user-plus"></i> Daftar Sekarang
                </a>
                <a href="{{ url('/about') }}" class="btn-secondary-custom">
                    <i class="fas fa-info-circle"></i> Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Main Content -->
    <main class="content-wrapper">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer-custom">
        <div class="container">
            <div class="footer-links">
                <a href="{{ url('/index') }}"><i class="fas fa-home"></i> Home</a>
                <a href="{{ url('/about') }}"><i class="fas fa-info-circle"></i> About</a>
                <a href="{{ url('/homepage') }}"><i class="fas fa-file-alt"></i> Pendaftaran</a>
                <a href="{{ url('/login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2026 Platform Pendaftaran Siswa. All rights reserved.</p>
                <p style="font-size: 12px; margin-top: 10px;">Dibuat dengan <i class="fas fa-heart" style="color: var(--danger);"></i> untuk pendidikan</p>
            </div>
        </div>
    </footer>

    @stack('css')
</body>
</html>