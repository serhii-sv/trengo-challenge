<?php

namespace App\Containers\Article\Data\Seeders;

use App\Containers\Article\Models\Article;
use App\Containers\Category\Models\Category;
use App\Ship\Parents\Seeders\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    public function run()
    {
      if (config('app.env') == 'production') {
        return 0;
      }

      /** @var int $articlesCount */
      $articlesCount = Article::count();

      if ($articlesCount > 0) {
        return 0;
      }

      $countOfArticles = env('SEEDER_ARTICLES', 1000);

      $faker = Factory::create();

      for ($i = 1; $i <= $countOfArticles; $i++) {
        $article = Article::create([
          'title' => $faker->word,
          'body'  => $faker->text('100'),
        ]);

        echo ($countOfArticles-$i)." left --> article: ".$article->title." created\r\n";
      }
    }
}
