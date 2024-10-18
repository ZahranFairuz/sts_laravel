<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;

Route::get('/', [BankController::class, 'welcome'])->name('welcome');
Route::get('/banks', [BankController::class, 'index'])->name('banks.index');
Route::get('/banks/create', [BankController::class, 'create'])->name('banks.create');
Route::post('/banks', [BankController::class, 'store'])->name('banks.store');
Route::get('/banks/{bank}', [BankController::class, 'show'])->name('banks.show');
Route::get('/banks/{bank}/edit', [BankController::class, 'edit'])->name('banks.edit');
Route::put('/banks/{bank}', [BankController::class, 'update'])->name('banks.update');
Route::delete('/banks/{bank}', [BankController::class, 'destroy'])->name('banks.destroy');

Route::get('/banks/withdraw/select', [BankController::class, 'withdrawSelect'])->name('banks.withdrawSelect');
Route::post('/banks/withdraw', [BankController::class, 'withdrawForm'])->name('banks.withdrawForm'); // Menampilkan form penarikan
Route::post('/banks/withdraw/submit', [BankController::class, 'withdraw'])->name('banks.withdraw'); // Mengirimkan data penarikan




