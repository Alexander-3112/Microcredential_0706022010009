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
        Schema::create('borrowing', function (Blueprint $table) {
    
        $table->id();
        $table->unsignedBigInteger('id_buku');
        $table->unsignedBigInteger('id_nama');
        $table->date('tanggal_pinjam');
        $table->date('tanggal_kembali');
        $table->foreign('id_buku')->references('id')->on('books')->onUpdate('cascade')->onDelete('cascade');
        $table->foreign('id_nama')->references('id')->on('borrowers')->onUpdate('cascade')->onDelete('cascade');
        $table->timestamps();

    });
}


 
// Reverse the migrations.*/
public function down(): void{Schema::dropIfExists('peminjaman');}
};

