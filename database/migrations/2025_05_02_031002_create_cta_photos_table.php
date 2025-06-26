<?php

use App\Models\Cta;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cta_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cta::class)->constrained()->cascadeOnDelete();
            $table->string('img_src')->nullable();
            $table->string('alt')->nullable();
            $table->string('active')->default(false);
            $table->string('position')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cta_photos');
    }
};
