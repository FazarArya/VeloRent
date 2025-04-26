<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('katalogs', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->string('jenis_kendaraan'); // motor/mobil
            $table->string('nama_kendaraan'); // contoh: Honda Jazz
            $table->text('deskripsi')->nullable();
            $table->decimal('harga_sewa', 10, 2); // harga sewa kendaraan
            $table->unsignedBigInteger('kategori_id'); // Relasi ke tabel kategoris
            $table->timestamps();

            // Foreign key ke tabel kategoris
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('katalogs', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
        });
        Schema::dropIfExists('katalogs');
    }
};
