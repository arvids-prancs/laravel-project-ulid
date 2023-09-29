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
        Schema::create('api_contacts', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('image_id')->nullable()->constrained(table: 'api_images');
            //
            $table->string('postcode')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('vat_registration_number')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('gmt')->nullable();
            $table->text('map')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
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
        Schema::dropIfExists('api_contacts');
    }
};
