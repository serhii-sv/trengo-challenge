<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVoteTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
      Schema::create('votes', function (Blueprint $table) {

        $table->increments('id');

        $table->integer('article_id')->unsigned();
        $table->enum('score', [
          1, 2, 3, 4, 5
        ]);
        $table->string('ip_address');

        $table->timestamps();
        //$table->softDeletes();

      });

      Schema::table('votes', function (Blueprint $table) {

        $table->foreign('article_id')->references('id')->on('articles');

      });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
