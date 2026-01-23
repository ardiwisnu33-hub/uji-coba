@extends('layouts.back')
@section('title','hapus')
@section('content')    

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
            <tr>
                <th>Foto</th>
                <td>
                    <img src="{{ asset('foto_siswa/' . $siswa->foto) }}" alt="Foto {{ $siswa->nama }}" class="img-thumbnail" style="width: 150px;">
                </td>
            </tr>
        </table>
        <form action="{{ url('/siswa/delete/' . $siswa->id) }}" method="post">
            @csrf
            @method('delete')
            <div class="text-center">
                <a href="{{ url('/data-siswa') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
    </div>
    
@endsection  