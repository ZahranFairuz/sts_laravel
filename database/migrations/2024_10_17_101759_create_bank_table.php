<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id(); // Primary key auto increments
            $table->string('account_number')->unique(); // Nomor rekening unik
            $table->string('account_name'); // Nama pemilik rekening
            $table->enum('account_type', ['tabungan', 'giro',]); // Jenis akun: tabungan, giro, deposito
            $table->decimal('balance', 15, 2); // Saldo dengan dua digit desimal
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
