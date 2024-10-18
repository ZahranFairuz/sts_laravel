@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Daftar Akun Bank</h1>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No Rekening</th>
                        <th>Nama Pemilik</th>
                        <th>Jenis Akun</th>
                        <th>Saldo</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($banks as $bank)
                        <tr>
                            <td>{{ $bank->account_number }}</td>
                            <td>{{ $bank->account_name }}</td>
                            <td>{{ ucfirst($bank->account_type) }}</td>
                            <td>{{ number_format($bank->balance, 2) }}</td>
                            <td>
                                <a href="{{ route('banks.show', $bank->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                <a href="{{ route('banks.edit', $bank->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('banks.destroy', $bank->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus akun ini?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data akun bank.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
