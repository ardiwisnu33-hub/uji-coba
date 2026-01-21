<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Hapus Data Siswa</h1>
        <p class="text-center">Apakah Anda yakin ingin menghapus data siswa </p>
        <table class="table">
            <tr>
                <th>Nama</th>
                <td>{{ $siswa->nama }}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{ $siswa->kelas }}</td>
            </tr>
            <tr>
                <th>Jurusan</th>
                <td>{{ $siswa->jurusan }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $siswa->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td>{{ $siswa->tempat_lahir }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $siswa->tanggal_lahir->isoFormat('D MMMM YYYY') }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $siswa->alamat }}</td>
            </tr>
        </table>
        <form action="{{ url('/siswa/hapus/' . $siswa->id) }}" method="post">
            @csrf
            <div class="text-center">
                <a href="{{ url('/data-siswa') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
    </div>
</body>
</html>