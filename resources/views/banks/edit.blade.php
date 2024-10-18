@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Edit Akun Bank</h1>
    <a href="{{ route('banks.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar</a>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('banks.update', $bank->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="account_number" class="form-label">No Rekening</label>
                    <input type="text" class="form-control" id="account_number" name="account_number" value="{{ $bank->account_number }}" required>
                </div>
                <div class="mb-3">
                    <label for="account_name" class="form-label">Nama Pemilik</label>
                    <input type="text" class="form-control" id="account_name" name="account_name" value="{{ $bank->account_name }}" required>
                </div>
                <div class="mb-3">
                    <label for="account_type" class="form-label">Jenis Akun</label>
                    <select class="form-select" id="account_type" name="account_type" required>
                        <option value="tabungan" {{ $bank->account_type == 'tabungan' ? 'selected' : '' }}>Tabungan</option>
                        <option value="giro" {{ $bank->account_type == 'giro' ? 'selected' : '' }}>Giro</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="balance" class="form-label">Saldo</label>
                    <input type="number" class="form-control" id="balance" name="balance" value="{{ $bank->balance }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </form>
        </div>
    </div>
@endsection
