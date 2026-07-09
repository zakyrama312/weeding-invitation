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
    Schema::create('brides', function (Blueprint $table) {
        $table->id();
        $table->foreignId('invitation_id')->constrained()->onDelete('cascade');
        $table->string('groom_name');
        $table->string('groom_nickname');
        $table->string('groom_father')->nullable();
        $table->string('groom_mother')->nullable();
        $table->string('bride_name');
        $table->string('bride_nickname');
        $table->string('bride_father')->nullable();
        $table->string('bride_mother')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brides');
    }
};
