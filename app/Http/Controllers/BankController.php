<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function welcome() {
        // logika yang diinginkan di sini
        return view('welcome');
    }

    // Menampilkan semua data bank
    public function index()
    {
        $banks = Bank::all();
        return view('banks.index', compact('banks'));
    }

    // Menampilkan form untuk membuat akun baru
    public function create()
    {
        return view('banks.create');
    }

    // Menyimpan data akun baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'account_number' => 'required|unique:banks',
            'account_name' => 'required',
            'account_type' => 'required|in:tabungan,giro',
            'balance' => 'required|numeric',
        ]);

        Bank::create($request->all());

        return redirect()->route('banks.index')
                         ->with('success', 'Account created successfully.');
    }

    // Menampilkan detail akun tertentu
    public function show(Bank $bank)
    {
        return view('banks.show', compact('bank'));
    }

    // Menampilkan form untuk mengedit akun
    public function edit(Bank $bank)
    {
        return view('banks.edit', compact('bank'));
    }

    // Memperbarui data akun di database
    public function update(Request $request, Bank $bank)
    {
        $request->validate([
            'account_number' => 'required|unique:banks,account_number,' . $bank->id,
            'account_name' => 'required',
            'account_type' => 'required|in:tabungan,giro',
            'balance' => 'required|numeric',
        ]);

        $bank->update($request->all());

        return redirect()->route('banks.index')
                         ->with('success', 'Account updated successfully.');
    }

    // Menghapus data akun dari database
    public function destroy(Bank $bank)
    {
        $bank->delete();

        return redirect()->route('banks.index')
                         ->with('success', 'Account deleted successfully.');
    }


    public function withdrawSelect()
{
    $banks = Bank::all(); // Ambil semua bank
    return view('banks.withdraw-select', compact('banks')); // Pastikan nama view sesuai dengan nama file
}

    
    public function withdrawForm(Request $request)
    {
        $bankId = $request->input('bank_id'); // Mengambil dari POST request
        $bank = Bank::findOrFail($bankId);
        
        return view('banks.withdraw', compact('bank'));
    }
    

    
    public function withdraw(Request $request)
{
    
    $request->validate([
        'bank_id' => 'required|exists:banks,id',
        'amount' => 'required|numeric|min:1',
    ]);

    $bank = Bank::findOrFail($request->bank_id);

    if ($bank->balance < $request->amount) {
        return redirect()->back()->withErrors(['error' => 'Saldo tidak cukup untuk penarikan.']);
    }

    // Update saldo
    $bank->balance -= $request->amount;
    $bank->save();

    return redirect()->route('banks.index')
    ->with('success', 'Penarikan sebesar Rp ' . number_format($request->amount, 0, ',', '.') . ' berhasil dilakukan!');
}


    public function withdrawSuccess(Request $request)
{
    $amount = $request->session()->get('amount'); // Menangkap dari session
    return view('banks.withdrawSuccess', compact('amount'));
}

}




