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
        Schema::create('cta_form_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cta_id')->constrained('ctas')->onDelete('cascade'); // Relate to the CTA table
            $table->string('name');
            $table->string('email');
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       
        Schema::dropIfExists('cta_form_submissions');
    }
};
