<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiSitemapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_sitemap', function (Blueprint $table) {
            $table->id();
            $table->foreignId('foreign_id')->nullable();
            $table->foreignId('image_id')->nullable();
            //
            $table->string('api_component')->nullable();
            $table->string('api_controller')->nullable();
            $table->string('api_icon')->nullable();
            $table->string('api_methods')->nullable();
            $table->string('web_controller')->nullable();
            $table->string('web_methods')->nullable();
            $table->string('policy')->nullable();
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
        Schema::dropIfExists('api_sitemap');
    }
}
