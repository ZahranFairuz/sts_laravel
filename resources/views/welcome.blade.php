@extends('layouts.app')

@section('content')
    <div class="p-5 mb-4 bg-primary text-white rounded shadow-lg text-center">
        <h1 class="display-5 fw-bold">Selamat Datang di Bank App!</h1>
        <p class="lead">Kami siap membantu Anda mengelola keuangan dengan mudah dan aman.</p>
        <hr class="my-4">
        <p>Mulai perjalanan dengan menyimpan uang di Bank App!</p>
        <a href="{{ route('banks.index') }}" class="btn btn-light btn-lg mt-3">Data Akun</a>
    </div>
@endsection
