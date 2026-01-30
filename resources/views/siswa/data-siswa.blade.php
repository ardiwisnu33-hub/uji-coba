@extends('layouts.back')
@section('title', 'Data Siswa')
@section('content')

    <div class="mt-2">
        <a href="{{ url('/data-siswa') }}" class="text-decoration-none mt-3 btn btn-primary text-center">Tambah Data</a>
    </div>
    <div class="col-12 col-sm-8 col-md-4 my-3">
        <label for="" class="mb-3">Cari Data Siswa</label>
        <form action="{{ url('/data-siswa') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control ml-2" name="cari"
                    placeholder="Nama Siswa, Kelas, dan Jurusan." required>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Cari</button>
                    <a href="{{ url('/data-siswa') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
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
            @if (count($data) > 0)
                @foreach ($data as $s)
                    <tr>
                        {{-- td ini diganti dengan kode td 1 baris dibawah ini agar menampilkan data per halaman dengan nomor urut yang benar <td class="text-center">{{ $loop->iteration }}</td> --}}
                        <td>{{ $loop->iteration + ($data->currentPage()-1) * $data->perPage() }}</td>
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
                            <a href="{{ url('/siswa/edit/' . $s->id) }}" class="btn btn-warning my-2">Edit</a>
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
    {{ $data->appends(request()->query())->links() }}

@endsection

@push('css')
    <style>
        
    </style>
@endpush