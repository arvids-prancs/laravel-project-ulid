<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('image_id')->nullable();
            $table->foreignId('image2_id')->nullable();
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
            $table->integer('created_at_user')->nullable();
            $table->integer('updated_at_user')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_contacts');
    }
}
