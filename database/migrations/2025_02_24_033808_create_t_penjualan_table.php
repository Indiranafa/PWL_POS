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
        Schema::create('t_penjualan', function (Blueprint $table) {
                $table->id('penjualan_id'); // Primary Key
                $table->unsignedBigInteger('user_id')->index(); // Foreign Key
                $table->string('pembeli', 50);
                $table->string('penjualan_kode', 20)->unique();
                $table->dateTime('penjualan_tanggal');
                $table->timestamps(); // Menambahkan created_at & updated_at otomatis
    
                // Definisi foreign key ke tabel m_user
                $table->foreign('user_id')->references('user_id')->on('m_user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_penjualan', function (Blueprint $table) {
            //
        });
    }
};
