<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiImagesLocalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_images_locales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('foreign_id')->nullable();
            $table->unsignedTinyInteger('lang_id')->nullable();
            //
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('copyright')->nullable();
            $table->string('link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_images_locales');
    }
}
