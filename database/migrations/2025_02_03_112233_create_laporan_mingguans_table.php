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
        Schema::create('laporan_mingguans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id');
            $table->date('tgl_laporan');
            $table->string('status');
            $table->string('file_logbook');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_mingguans');
    }
};
