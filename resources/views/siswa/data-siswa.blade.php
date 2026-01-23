@extends('layouts.back')
@section('title', 'Data Siswa')
@section('content')

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
                <th>Foto</th>
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
                        <td>
                            <center>
                                <img src="{{ asset('foto_siswa/' . $s->foto) }}" alt="foto  {{ $s->nama }}"
                                    class="img-thumbnail" style="width: 20%;">
                            </center>
                        </td>
                        <td align="center">
                            <a href="{{ url('/siswa/edit/' . $s->id) }}" class="btn btn-warning">Edit</a>
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

@endsection

@push('css')
    <style>
        
    </style>
@endpush