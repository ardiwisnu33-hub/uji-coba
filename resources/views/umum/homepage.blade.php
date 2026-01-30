@extends('layouts.front')
@section('title','form-pendaftaran')
@section('content')

<div class="col-md-3 justify-content-center align-items-center" style="margin: 100px auto;">
    <div class="card course-card h-100">
        <img src="{{ asset('assets/img/pendaftaran.jpg') }}" class="card-img-top" alt="Course Image">
        <div class="card-body">
            <h5 class="card-title">Pendaftaran Siswa Baru</h5>
            <ol>
                <li>Mengemudi</li>
                <li>Komputer</li>
                <li>Bahasa Inggris</li>
            </ol>
        </div>
        <div class="d-flex justify-content-center align-items-center mb-3">
            <a href="{{ url('/pendaftaran') }}" class="btn btn-primary">Daftar Sekarang</a>
        </div>
    </div>
</div>
@endsection