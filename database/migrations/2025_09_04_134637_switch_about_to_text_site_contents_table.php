<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('site_contents', function (Blueprint $table) {
            $table->text('about_text')->change();
            $table->text('footer_about')->change();
        });
    }

    public function down(): void
    {
        Schema::table('site_contents', function (Blueprint $table) {
            $table->string('about_text', 255)->change();
            $table->string('footer_about', 255)->change();
        });
    }
};