<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_translations', function (Blueprint $table) {
            $table->id();
            //
            $table->string('key', 50)->nullable();
            //
            $table->unsignedBigInteger('sequence')->nullable();
            $table->boolean('publish')->default(1);
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
        Schema::dropIfExists('api_translations');
    }
}
