<?php

/**
 * @apiGroup           Article
 * @apiName            findArticleById
 *
 * @api                {GET} /v1/articles/:id Show article
 * @apiDescription     Show specific article by ID
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  "data": {
    "object": "Article",
    "id": "wjkxyb6y5men3dvr",
    "title": "voluptatem",
    "body": "Quis fugiat cumque ipsam vero officiis. Pariatur earum eligendi hic non necessitatibus ea possimus.",
    "created_at": "2021-03-04T13:31:55.000000Z",
    "updated_at": "2021-03-04T13:31:55.000000Z",
    "categories": [
      {
        "id": 8,
        "title": "accusamus",
        "created_at": "2021-03-04T13:32:04.000000Z",
        "updated_at": "2021-03-04T13:32:04.000000Z",
        "pivot": {
        "article_id": 1,
        "category_id": 8
      }
      },
      {
        "id": 10,
        "title": "provident",
        "created_at": "2021-03-04T13:32:04.000000Z",
        "updated_at": "2021-03-04T13:32:04.000000Z",
        "pivot": {
        "article_id": 1,
        "category_id": 10
      }
      }
    ],
    "views_total": 0,
    "popularity": 0
    },
    "meta": {
    "include": [],
    "custom": []
  }
}
 */

/** @var Route $router */
$router->get('articles/{id}', [
    'as' => 'api_article_find_article_by_id',
    'uses'  => 'Controller@findArticleById',
//    'middleware' => [
//      'auth:api',
//    ],
]);
