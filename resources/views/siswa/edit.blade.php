<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Siswa</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header" style="background-color: rgb(92, 51, 240); align-items: center;">
        <h1 style="color: white; text-align: center;">Edit Data Siswa</h1>
        <nav class="navbar">
            <ul style="list-style-type: none; text-decoration: none; display: flex;">
                <li><a href="{{ url('/index') }}" style="color: white; text-decoration: none; margin: 5px; font-family: sans-serif;">Home</a></li>
                <li><a href="{{ url('/data-siswa') }}" style="color: white; text-decoration: none; margin: 5px; font-family: sans-serif;">Data Siswa</a></li>
                <li><a href="{{ url('/about') }}" style="color: white; text-decoration: none; margin: 5px; font-family: sans-serif;">About</a></li>
            </ul>
        </nav>
    </header>

    <div class="container mt-3">
        <form action="{{ url('/siswa/update/'.$siswa->id) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama')
                    is-invalid
                @enderror" name="nama" id="nama" value="{{ old('nama', $siswa->nama) }}" />
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control @error('kelas')
                    is-invalid
                @enderror" name="kelas" id="kelas" value="{{ old('kelas', $siswa->kelas) }}">
                @error('kelas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control @error('jurusan')
                    is-invalid
                @enderror" name="jurusan" id="jurusan" value="{{ old('jurusan', $siswa->jurusan) }}">
                @error('jurusan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-control @error('jenis_kelamin')
                    is-invalid
                @enderror" name="jenis_kelamin" id="jenis_kelamin">
                    <option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : null }}>Laki-laki</option>
                    <option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : null }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control @error('tempat_lahir')
                    is-invalid
                @enderror" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}">
                @error('tempat_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control @error('tanggal_lahir')
                    is-invalid
                @enderror" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir->format('Y-m-d')) }}">
                @error('tanggal_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control @error('alamat')
                    is-invalid
                @enderror" name="alamat" id="alamat">{{ old('alamat', $siswa->alamat) }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="text-center mt-3">
                <a href="{{ url('/data-siswa') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>

</body>
</html>