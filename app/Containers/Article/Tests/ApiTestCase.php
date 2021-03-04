<?php

namespace App\Containers\Article\Tests;

use App\Containers\Article\Models\Article;
use App\Containers\Category\Models\Category;
use App\Containers\User\Tests\TestCase as BaseTestCase;

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
  public function testCreateArticle()
  {
    $data = [
      'title'       => 'Test API title',
      'body'        => 'Test API body',
      'categories'  => json_encode([Category::all()->random()->id]),
    ];

    $response = $this->post(env('API_URL').':'.env('CURRENT_SERVER_PORT', 80).'/v1/articles', [
      'title'       => $data['title'],
      'body'        => $data['body'],
      'categories'  => $data['categories'],
    ], [
      'accept' => 'application/json',
    ]);

    $response->assertJsonFragment(['title' => 'Test API title']);
  }

  /**
   * @test
   */
  public function testArticlesList()
  {
    $response = $this->get(env('API_URL').':'.env('CURRENT_SERVER_PORT', 80).'/v1/articles', [
      'accept' => 'application/json',
    ]);

    $response->assertJsonFragment(['object' => 'Article']);

    // TODO: asserts with filters
  }

  /**
   * @test
   */
  public function testArticleShow()
  {
    /** @var Article $randomArticle */
    $randomArticle = Article::first();

    $response = $this->get(env('API_URL').':'.env('CURRENT_SERVER_PORT', 80).'/v1/articles/'.$randomArticle->getHashedKey(), [
      'accept' => 'application/json',
    ]);

    $response->assertJsonFragment(['object' => 'Article']);
  }
}
