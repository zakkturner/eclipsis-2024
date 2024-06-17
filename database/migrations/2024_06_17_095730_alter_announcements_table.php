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
        Schema::table('announcements', function (Blueprint $table) {

            $table->dropColumn("phone");
            $table->dropColumn("facebook_url");
            $table->dropColumn("twitter_url");
            $table->dropColumn("instagram_url");
            $table->dropColumn("youtube_url");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
