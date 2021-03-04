<?php

namespace App\Containers\Vote\Data\Seeders;

use App\Containers\Article\Models\Article;
use App\Containers\Vote\Models\Vote;
use App\Ship\Parents\Seeders\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class VoteSeeder extends Seeder
{
    public function run()
    {
      if (config('app.env') == 'production') {
        return 0;
      }

      /** @var int $votesCount */
      $votesCount = Vote::count();

      if ($votesCount > 0) {
        return 0;
      }

      $countOfVotes = env('SEEDER_VOTES', 10000);

      $faker = Factory::create();

      $dataArray = [];

      $randomArticles = collect(Article::inRandomOrder()->limit((int) env('SEEDER_ARTICLES', 1000))->get());

      if (count($randomArticles) == 0) {
        throw new \Exception('Random articles not found');
      }

      for ($i = 1; $i <= $countOfVotes; $i++) {
        $randomArticleId = $randomArticles->random(1)[0]['id'];

        $dataArray[] = array(
          'article_id'   => $randomArticleId,
          'score'        => $faker->numberBetween(1,5),
          'ip_address'   => $faker->ipv4,
          'created_at'   => now()->toDateTimeString(),
        );

        if (count($dataArray) < ($countOfVotes/10)) {
          continue;
        }

        DB::table('votes')
          ->insert($dataArray);

        // clean array
        $dataArray = [];

        echo ($countOfVotes-$i)." left --> VOTES BULK SEEDER\r\n";
      }
    }
}
