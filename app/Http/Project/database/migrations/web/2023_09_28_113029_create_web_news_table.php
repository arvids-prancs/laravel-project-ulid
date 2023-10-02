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
        Schema::create('web_news', function (Blueprint $table) {
            $table->ulid('id')->primary();
            //
            $table->foreignUlid('image_id')->nullable()->constrained(table: 'api_images');
            $table->foreignUlid('images_storage_id')->nullable()->constrained(table: 'api_images_storages');
            $table->foreignUlid('files_storage_id')->nullable()->constrained(table: 'api_files_storages');
            //
            $table->unsignedBigInteger('sequence')->nullable();
            $table->boolean('publish')->default(0);
            $table->foreignUlid('created_at_user')->constrained(table: 'users');
            $table->foreignUlid('updated_at_user')->constrained(table: 'users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_news');
    }
};
