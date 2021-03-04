<?php

namespace App\Containers\View\Data\Seeders;

use App\Containers\Article\Models\Article;
use App\Containers\View\Models\View;
use App\Ship\Parents\Seeders\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class ViewSeeder extends Seeder
{
    public function run()
    {
      if (config('app.env') == 'production') {
        return 0;
      }

      /** @var int $viewsCount */
      $viewsCount = View::count();

      if ($viewsCount > 0) {
        return 0;
      }

      $countOfViews = env('SEEDER_VIEWS', 100000);

      $faker = Factory::create();

      $dataArray = [];

      $randomArticles = collect(Article::inRandomOrder()->limit((int) env('SEEDER_ARTICLES', 1000))->get());

      if (count($randomArticles) == 0) {
        throw new \Exception('Random articles not found');
      }

      for ($i = 1; $i <= $countOfViews; $i++) {
        $randomArticleId = $randomArticles->random(1)[0]['id'];

        $dataArray[] = array(
          'article_id' => $randomArticleId,
          'ip_address' => $faker->ipv4,
          'created_at' => now()->toDateTimeString(),
        );

        if (count($dataArray) < ($countOfViews/10)) {
          continue;
        }

        DB::table('views')
          ->insert($dataArray);

        // clean array
        $dataArray = [];

        echo ($countOfViews-$i)." left --> VIEWS BULK SEEDER\r\n";
      }
    }
}
