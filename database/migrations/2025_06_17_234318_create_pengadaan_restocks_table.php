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
        Schema::create('pengadaan_restocks', function (Blueprint $table) {
            $table->id();
            $table->string('noseries')->unique();
            $table->foreignId('toko_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('status')->default(1);
            $table->dateTime('tgl_pengadaan');
            $table->text('catatan')->nullable();
            $table->integer('total_produk')->nullable();
            $table->integer('total_unit_produk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengadaan_restocks');
    }
};
