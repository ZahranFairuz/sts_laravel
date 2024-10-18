@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Detail Akun Bank</h1>
    <a href="{{ route('banks.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar</a>
    
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">No Rekening: {{ $bank->account_number }}</h5>
        </div>
        <div class="card-body">
            <h5 class="card-title"><strong>Nama Pemilik:</strong> {{ $bank->account_name }}</h5>
            <p class="card-text"><strong>Jenis Akun:</strong> {{ ucfirst($bank->account_type) }}</p>
            <p class="card-text"><strong>Saldo:</strong> Rp{{ number_format($bank->balance, 2) }}</p>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('banks.edit', $bank->id) }}" class="btn btn-warning">Edit Akun</a>
            <form action="{{ route('banks.destroy', $bank->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus akun ini?');">Hapus Akun</button>
            </form>
        </div>
    </div>
@endsection
