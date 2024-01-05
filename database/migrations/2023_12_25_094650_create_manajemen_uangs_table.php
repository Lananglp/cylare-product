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
        Schema::create('manajemen_uangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('gaji')->nullable();
            $table->bigInteger('persen_satu')->default(40);
            $table->bigInteger('total_satu')->nullable();
            $table->bigInteger('persen_dua')->default(30);
            $table->bigInteger('total_dua')->nullable();
            $table->bigInteger('persen_tiga')->default(20);
            $table->bigInteger('total_tiga')->nullable();
            $table->bigInteger('persen_empat')->default(10);
            $table->bigInteger('total_empat')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manajemen_uangs');
    }
};
