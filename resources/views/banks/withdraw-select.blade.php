@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Pilih Akun untuk Penarikan</h1>
    <form action="{{ route('banks.withdrawForm') }}" method="POST" class="form-inline">
        @csrf
        <div class="form-group mb-3">
            <label for="bank_id" class="form-label">Pilih Bank:</label>
            <select name="bank_id" id="bank_id" class="form-control mx-sm-3" required>
                <option value="" disabled selected>Pilih bank...</option>
                @foreach($banks as $bank)
                    <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                @endforeach
            </select>                         
        </div>

        <button type="submit" class="btn btn-primary">Pilih Bank</button>
    </form>
</div>
@endsection
