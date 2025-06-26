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
        Schema::table('clients', function (Blueprint $table) {
            $table->string('status')->default('lead');
            $table->timestamp('last_contacted_at')->nullable();
            $table->timestamp('next_follow_up_at')->nullable();
            $table->timestamp('converted_at')->nullable();
            $table->string('lead_source')->nullable();
            $table->string('industry')->nullable();
            $table->boolean('is_active')->default(true);
            $table->json('tags')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn([
                'status',
                'last_contacted_at',
                'next_follow_up_at',
                'converted_at',
                'lead_source',
                'industry',
                'is_active',
                'tags',
            ]);
        });
    }
};
