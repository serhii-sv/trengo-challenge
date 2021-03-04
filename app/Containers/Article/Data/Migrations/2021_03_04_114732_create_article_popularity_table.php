<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlePopularityTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
      Schema::create('article_popularity', function (Blueprint $table) {

        $table->increments('id');

        $table->integer('article_id')->unsigned()->index()->nullable();
        $table->bigInteger('views_count')->unsigned()->default(0);
        $table->float('popularity')->unsigned()->default(0);

        $table->date('date');

        $table->timestamps();

      });

      Schema::table('article_popularity', function (Blueprint $table) {

        $table->foreign('article_id')->references('id')->on('articles');

      });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('article_popularity');
    }
}
