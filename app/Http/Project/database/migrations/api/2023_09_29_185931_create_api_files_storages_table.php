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
        Schema::create('api_files_storages', function (Blueprint $table) {
            $table->ulid('id')->primary();
            //
            $table->string('path')->nullable();
            $table->string('folder')->nullable();
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
        Schema::dropIfExists('api_files_storages');
    }
};
