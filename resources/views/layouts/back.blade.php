<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Admin</title>
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
            background-color: var(--light);
            color: var(--dark);
        }

        /* Sidebar */
        .sidebar {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 260px;
            padding: 30px 0;
            box-shadow: 0 10px 40px rgba(92, 51, 240, 0.15);
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 0 25px;
            margin-bottom: 40px;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            font-size: 20px;
        }

        .sidebar-brand i {
            font-size: 28px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin: 5px 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            padding: 12px 25px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: rgba(255, 255, 255, 0.15);
            color: white;
            padding-left: 35px;
            border-radius: 0 30px 30px 0;
        }

        .sidebar-menu i {
            width: 20px;
            text-align: center;
        }

        /* Header */
        .header-top {
            background: white;
            padding: 15px 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-left: 260px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .page-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .page-title i {
            color: var(--primary);
            font-size: 28px;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-menu a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            padding: 8px 20px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .user-menu a:hover {
            background-color: var(--light);
            color: var(--primary);
        }

        .logout-btn {
            background: linear-gradient(135deg, var(--danger) 0%, #dc2626 100%);
            color: white !important;
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(239, 68, 68, 0.3);
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 30px;
            min-height: 100vh;
        }

        .container {
            max-width: 100%;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                box-shadow: 0 5px 15px rgba(92, 51, 240, 0.1);
                padding: 20px 0;
                display: none;
            }

            .sidebar.show {
                display: block;
            }

            .sidebar-menu {
                display: flex;
                flex-wrap: wrap;
            }

            .sidebar-menu li {
                flex: 1 1 50%;
            }

            .header-top {
                margin-left: 0;
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .page-title {
                font-size: 20px;
            }
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInDown {
            animation: fadeInDown 0.5s ease-out;
        }

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
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <a href="{{ url('/index') }}" class="sidebar-brand">
            <i class="fas fa-graduation-cap"></i>
            <span>Admin Panel</span>
        </a>
        
        <ul class="sidebar-menu">
            <li>
                <a href="{{ url('/dashboard') }}" class="@if(request()->path() == 'dashboard') active @endif">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/data-siswa') }}" class="@if(request()->path() == 'data-siswa') active @endif">
                    <i class="fas fa-users"></i>
                    <span>Data Siswa</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/user') }}" class="@if(request()->path() == 'user') active @endif">
                    <i class="fas fa-user-cog"></i>
                    <span>Pengaturan Akun</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/logout') }}" onclick="return confirm('Anda yakin ingin logout?')">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </aside>

    <!-- Header Top -->
    <header class="header-top animate-fadeInDown">
        <div class="page-title">
            <i class="fas fa-bars" onclick="toggleSidebar()" style="cursor: pointer; display: none;" id="toggleBtn"></i>
            <i class="fas fa-chart-line"></i>
            <span>@yield('title')</span>
        </div>
        
        <div class="user-menu">
            <a href="{{ url('/index') }}" class="btn btn-sm" style="background-color: var(--light); color: var(--primary);">
                <i class="fas fa-home"></i> Beranda
            </a>
            <a href="{{ url('/logout') }}" class="btn btn-sm logout-btn" onclick="return confirm('Anda yakin ingin logout?');">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content animate-fadeInDown">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }

        // Show toggle button on mobile
        function checkScreenSize() {
            const toggleBtn = document.getElementById('toggleBtn');
            if (window.innerWidth <= 768) {
                toggleBtn.style.display = 'block';
            } else {
                toggleBtn.style.display = 'none';
                document.getElementById('sidebar').classList.remove('show');
            }
        }

        checkScreenSize();
        window.addEventListener('resize', checkScreenSize);
    </script>
</body>
</html>