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
    Schema::create('invitations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Jika nanti ada fitur login user
        $table->string('slug')->unique(); // Untuk URL unik undangan, misal: domain.com/wedding/andi-siti
        $table->string('title'); // Nama Acara Undangan
        $table->date('event_date');
        $table->time('event_time');
        $table->string('location_name'); // Nama Tempat / Gedung
        $table->text('location_address'); // Alamat Lengkap
        $table->string('google_maps_url')->nullable();
        $table->string('template_theme')->default('romance'); // Menyimpan nama tema/template
        $table->string('custom_size')->default('mobile-responsive'); // Menyimpan preferensi ukuran/layout
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
