@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Penarikan dari Akun {{ $bank->account_name }} ({{ $bank->account_number }})</h1>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('banks.withdraw') }}" method="POST">
        @csrf
        <input type="hidden" name="bank_id" value="{{ $bank->id }}">
    
        <div class="form-group mb-3">
            <label for="amount" class="form-label">Jumlah Penarikan</label>
            <input type="number" name="amount" id="amount" class="form-control" placeholder="Masukkan Jumlah Penarikan" required>
        </div>
    
        <button type="submit" class="btn btn-primary">Tarik Uang</button>
    </form>    
</div>
@endsection
