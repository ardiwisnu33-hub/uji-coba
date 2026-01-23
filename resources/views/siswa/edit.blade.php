@extends('layouts.back')
@section('title','edit')
@section('content')
    
<form action="{{ url('/siswa/update/'.$siswa->id) }}" method="post" enctype="multipart/form-data">
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
                <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : null }}>Laki-laki</option>
                <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : null }}>Perempuan</option>
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
                @isset($data->foto)
                <img src="{{ asset('foto_siswa' . '/' . $data->foto) }}" alt="foto {{ $data->nama }}"
                class="img-thumbnail" style="width: 20%;">
                @endisset
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Siswa</label>
                    <input type="file" name="foto" id="foto"
                    class="form-control @error('foto') is-invalid @enderror" value="{{ old('foto') }}">
                    @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center mt-3">
                    <a href="{{ url('/data-siswa') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
            
@endsection