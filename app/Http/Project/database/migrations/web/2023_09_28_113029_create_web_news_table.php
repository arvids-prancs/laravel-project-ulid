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
            $table->foreignUlid('image_id')->nullable();
            $table->foreignUlid('images_storage_id')->nullable();
            $table->foreignUlid('files_storage_id')->nullable();
            //
            $table->unsignedBigInteger('sequence')->nullable();
            $table->boolean('publish')->default(0);
            $table->integer('created_at_user')->nullable();
            $table->integer('updated_at_user')->nullable();
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
