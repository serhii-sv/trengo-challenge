<?php

namespace App\Containers\Vote\Tests;

use App\Containers\Article\Models\Article;
use App\Containers\User\Tests\TestCase as BaseTestCase;
use Faker\Factory;

/**
 * Class ApiTestCase.
 *
 * This is the container API TestCase class. Use this class to add your container specific API related helper functions.
 */
class ApiTestCase extends BaseTestCase
{
  /**
   * @test
   */
  public function testCreateVote()
  {
    /** @var Article $randomArticle */
    $randomArticle = Article::inRandomOrder()->first();

    $faker = Factory::create();

    $data = [
      'article_id'  => $randomArticle->getHashedKey(),
      'score'       => $faker->numberBetween(1,5),
    ];

    for($i=1; $i<=2; $i++) {
      $response = $this->post(env('API_URL') . ':' . env('CURRENT_SERVER_PORT', 80) . '/v1/votes', [
        'article_id' => $data['article_id'],
        'score' => $data['score'],
      ], [
        'accept' => 'application/json',
      ]);

      if ($i == 1) {
        $response->assertJsonFragment(['object' => 'Vote']);
      }

      if ($i == 2) {
        $response->assertStatus(500);
      }
    }
  }
}
