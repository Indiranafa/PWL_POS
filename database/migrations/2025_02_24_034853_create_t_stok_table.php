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
        Schema::create('t_stok', function (Blueprint $table) {
            $table->id('stok_id'); // Primary Key
            $table->unsignedBigInteger('supplier_id')->index(); // Foreign Key ke tabel supplier
            $table->unsignedBigInteger('barang_id')->index(); // Foreign Key ke tabel barang
            $table->unsignedBigInteger('user_id')->index(); // Foreign Key ke tabel user
            $table->dateTime('stok_tanggal'); // Tanggal stok
            $table->integer('stok_jumlah'); // Jumlah stok
            $table->timestamps(); // Kolom created_at & updated_at otomatis
    
            // Definisi Foreign Keys
            $table->foreign('supplier_id')->references('supplier_id')->on('m_supplier')->onDelete('cascade');
            $table->foreign('barang_id')->references('barang_id')->on('m_barang')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('m_user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_stok', function (Blueprint $table) {
            //
        });
    }
};
