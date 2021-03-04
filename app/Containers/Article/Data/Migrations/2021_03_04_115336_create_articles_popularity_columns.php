<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesPopularityColumns extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
      Schema::table('articles', function (Blueprint $table) {

        $table->integer('popularity')->unsigned()->after('body')->default(0);
        $table->integer('views_total')->unsigned()->after('popularity')->default(0);

      });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
      Schema::table('articles', function (Blueprint $table) {

        $table->dropColumn('popularity');
        $table->dropColumn('views_total');

      });
    }
}
