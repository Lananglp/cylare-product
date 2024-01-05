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
        Schema::create('keuangans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('total_gaji')->nullable();
            $table->bigInteger('total_satu')->nullable();
            $table->bigInteger('total_dua')->nullable();
            $table->bigInteger('total_tiga')->nullable();
            $table->bigInteger('total_empat')->nullable();
            $table->string('jenis');
            $table->bigInteger('jumlah')->default(0);
            $table->string('kebutuhan');
            $table->text('keterangan');
            $table->date('tanggal');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangans');
    }
};
