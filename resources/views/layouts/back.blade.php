<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    @stack('css')
    </head>  
<body>
    <header class="header" style="background-color: rgb(92, 51, 240); align-items: center;">
        <h1 style="color: white; text-align: center;">@yield('title')</h1>
        <nav class="navbar">
            <ul style="list-style-type: none; text-decoration: none; display: flex;">
                <li><a href="{{ url('/index') }}" style="color: white; text-decoration: none; margin: 5px; font-family: sans-serif;">Home</a></li>
                <li><a href="{{ url('/data-siswa') }}" style="color: white; text-decoration: none; margin: 5px; font-family: sans-serif;">Data Siswa</a></li>
                <li><a href="{{ url('/about') }}" style="color: white; text-decoration: none; margin: 5px; font-family: sans-serif;">About</a></li>
                <li><a href="{{ url('/homepage') }}" style="color: white; text-decoration: none; margin: 5px; font-family: sans-serif;">Pendaftaran</a></li>
                <li><a href="{{ url('/logout') }}" style="color: white; text-decoration: none; margin: 5px; font-family: sans-serif;">Logout</a></li>
            </ul>
        </nav>
    </header>
<div class="container">
    @yield('content')
</div>
</body>
</html>