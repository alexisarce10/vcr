<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('url');
            $table->string('iframe');

            //Generation foreign key
            $table->unsignedBigInteger('platform_id')->nullable();
            $table->unsignedBigInteger('unity_id');
            

            //Restriction foreign key
            $table->foreign('platform_id')->references('id')->on('platforms')->onDelete('set null');
            $table->foreign('unity_id')->references('id')->on('unities')->onDelete('cascade');
            

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
        Schema::dropIfExists('lessons');
    }
}
