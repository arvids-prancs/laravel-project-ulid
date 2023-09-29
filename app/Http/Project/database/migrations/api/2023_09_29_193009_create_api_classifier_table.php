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
        Schema::create('api_classifier', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('image_id')->nullable()->constrained(table: 'api_images');
            //
            $table->unsignedBigInteger('sequence')->nullable();
            $table->boolean('publish')->default(0);
            $table->foreignUlid('created_at_user')->constrained(table: 'users');
            $table->foreignUlid('updated_at_user')->constrained(table: 'users');
            $table->timestamps();
        });
        Schema::table('api_classifier', function (Blueprint $table) {
            $table->foreignUlid('foreign_id')->after('id')->nullable()->constrained(table: 'api_classifier');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_classifier');
    }
};
