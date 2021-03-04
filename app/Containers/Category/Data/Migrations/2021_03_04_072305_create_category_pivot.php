<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryPivot extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('category_articles', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('category_id')->unsigned()->index();
            $table->integer('article_id')->unsigned()->index();

        });

      Schema::table('category_articles', function (Blueprint $table) {

        $table->foreign('article_id')->references('id')->on('articles');
        $table->foreign('category_id')->references('id')->on('categories');

      });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('category_articles');
    }
}
