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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('panggilan')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('googleid')->nullable();
            $table->integer('roleuser')->default(2); // 1=admin, 2=user umum, 3=manager, 4=staff gudang, 5=staff penjualan
            $table->boolean('jk')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('notelp')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('isactive')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->id();
            $table->string('email')->index();
            $table->string('token', 36)->unique();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_resets');
    }
};
