<?php

namespace App\Containers\Article\Data\Seeders;

use App\Containers\Article\Models\Article;
use App\Containers\Category\Models\Category;
use App\Ship\Parents\Seeders\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class ArticleCategorySeeder2
 * @package App\Containers\Article\Data\Seeders
 *
 * TODO: find how to use sequence and use this seed as last seeder
 */
class ArticleCategorySeeder2 extends Seeder
{
    public function run()
    {
      $countOfPivots = DB::table('category_articles')->count();

      if ($countOfPivots > 0) {
        return 0;
      }

      foreach (Article::all() as $article) {
        /** @var Category $randomCategories */
        $randomCategories = Category::inRandomOrder()->limit(2)->get();

        /** @var Category $category */
        foreach ($randomCategories as $category) {
          // 2 CATEGORIES PER ONE ARTICLE
          DB::table('category_articles')->insert([
            'category_id' => $category->id,
            'article_id'  => $article->id,
          ]);

          echo "article: ".$article->title." joined to category ".$category->title."\r\n";
        }
      }
    }
}
