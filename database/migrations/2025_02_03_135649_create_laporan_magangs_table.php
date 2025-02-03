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
        Schema::create('laporan_magangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id');
            $table->date('tgl_laporan');
            $table->string('status');
            $table->text('keterangan')->nullable();
            $table->string('file_magang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_magangs');
    }
};
