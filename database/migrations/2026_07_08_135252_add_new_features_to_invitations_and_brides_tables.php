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
        Schema::table('invitations', function (Blueprint $table) {
            $table->text('quote_text')->nullable()->after('font_family');
            $table->string('quote_source')->nullable()->after('quote_text');
            $table->string('live_stream_url')->nullable()->after('quote_source');
            $table->text('physical_gift_address')->nullable()->after('live_stream_url');
            
            // Kolom Akad
            $table->date('akad_date')->nullable()->after('physical_gift_address');
            $table->string('akad_time')->nullable()->after('akad_date');
            $table->string('akad_location')->nullable()->after('akad_time');
            $table->text('akad_address')->nullable()->after('akad_location');
        });

        Schema::table('brides', function (Blueprint $table) {
            $table->string('groom_photo')->nullable()->after('groom_mother');
            $table->string('bride_photo')->nullable()->after('bride_mother');
            $table->json('love_story')->nullable()->after('bride_photo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->dropColumn([
                'quote_text', 'quote_source', 'live_stream_url', 'physical_gift_address',
                'akad_date', 'akad_time', 'akad_location', 'akad_address'
            ]);
        });

        Schema::table('brides', function (Blueprint $table) {
            $table->dropColumn(['groom_photo', 'bride_photo', 'love_story']);
        });
    }
};
