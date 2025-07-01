<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_contents', function (Blueprint $table) {
            $table->id();
            $table->string('headline_title')->nullable();
            $table->string('headline_text')->nullable();
            $table->string('headline_image')->nullable();
            $table->string('headline_button_text')->nullable();
            $table->string('about_text')->nullable();
            $table->string('footer_about')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_contents');
    }
};
