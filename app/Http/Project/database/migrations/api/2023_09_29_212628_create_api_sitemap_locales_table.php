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
        Schema::create('api_sitemap_locales', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('foreign_id')->nullable()->constrained(table: 'api_sitemap');
            $table->foreignUlid('lang_id')->nullable()->constrained(table: 'api_langs');
            //
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_sitemap_locales');
    }
};
