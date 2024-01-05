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
            $table->string('nama_panggilan');
            $table->string('email')->unique();
            $table->string('nama_lengkap');
            $table->string('alamat');
            $table->bigInteger('no_hp');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('gender');
            $table->string('user_type');
            $table->string('jabatan')->nullable();
            $table->string('group')->nullable();
            $table->text('bio')->nullable();
            $table->boolean('user_status')->default(true);
            $table->bigInteger('uang')->default(0);
            $table->boolean('saldoHarian')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
