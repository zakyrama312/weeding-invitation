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
    Schema::create('guests', function (Blueprint $table) {
        $table->id();
        $table->foreignId('invitation_id')->constrained()->onDelete('cascade');
        $table->string('name'); // Nama lengkap tamu
        $table->string('slug'); // Slug nama tamu untuk variasi URL aman
        $table->string('status_attendance')->default('pending'); // Konfirmasi kehadiran (hadir/tidak) jika dibutuhkan nanti
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
