<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('catatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('tanggal');
            $table->string('judul');
            $table->enum('kategori', ['pemasukan', 'pengeluaran']);
            $table->decimal('jumlah', 15, 2);
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable(); // untuk cover/gambar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('catatans');
    }
};
