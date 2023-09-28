<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('foreign_id')->nullable();
            //
            $table->string('path')->nullable();
            $table->string('name')->nullable();
            $table->string('extension')->nullable();
            $table->unsignedBigInteger('size')->nullable();
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
        Schema::dropIfExists('api_files');
    }
}
