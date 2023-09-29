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
        Schema::create('api_translations_locales', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('foreign_id')->nullable()->constrained(table: 'api_translations');
            $table->foreignUlid('lang_id')->nullable()->constrained(table: 'api_langs');
            //
            $table->string('singular')->nullable();
            $table->string('plural')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_translations_locales');
    }
};
