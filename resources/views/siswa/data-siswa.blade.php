<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Siswa</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header" style="background-color: rgb(92, 51, 240); align-items: center;">
        <h1 style="color: white; text-align: center;">Data Siswa</h1>
        <nav class="navbar">
            <ul style="list-style-type: none; text-decoration: none; display: flex;">
                <li><a href="{{ url('/index') }}" style="color: white; text-decoration: none; margin: 5px; font-family: sans-serif;">Home</a></li>
                <li><a href="{{ url('/data-siswa') }}" style="color: white; text-decoration: none; margin: 5px; font-family: sans-serif;">Data Siswa</a></li>
                <li><a href="{{ url('/about') }}" style="color: white; text-decoration: none; margin: 5px; font-family: sans-serif;">About</a></li>
            </ul>
        </nav>
    </header>
<div class="container">
    <table class="table table-bordered mt-3 shadow">
        <thead class="text-center">
            <tr>
                <th class="text-center">No</th>
                <th>Nama</th>
                <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (count($dataSiswa) > 0)
                @foreach ($dataSiswa as $s)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->kelas }}</td>
                    <td>{{ $s->jurusan }}</td>
                    <td>{{ $s->jenis_kelamin }}</td>
                    <td>{{ $s->tempat_lahir }}</td>
                    <td>{{ $s->tanggal_lahir->isoFormat('D MMMM Y') }}</td>
                    <td>{{ $s->alamat }}</td>
                    <td align="center">
                        <a href="{{ url('/siswa/edit/' . $s->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('/siswa/hapus/' . $s->id) }}" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                        <td colspan="9">
                            <h3 class="text-center">Data Kosong</h3>
                        </td>
                    </tr>
                @endif
            </tbody>
    </table>
    <div class="text-center">
    <a href="{{ url('siswa/tambah') }}" class="text-decoration-none mt-3 btn btn-primary text-center">Tambah Data</a>
    </div>
</div>
</body>
</html>