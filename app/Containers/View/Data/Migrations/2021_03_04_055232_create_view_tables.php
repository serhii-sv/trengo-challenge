<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateViewTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
      Schema::create('views', function (Blueprint $table) {

        $table->increments('id');

        $table->integer('article_id')->unsigned();
        $table->string('ip_address');

        $table->timestamps();
        //$table->softDeletes();

      });

      Schema::table('views', function (Blueprint $table) {

        $table->foreign('article_id')->references('id')->on('articles');

      });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('views');
    }
}
