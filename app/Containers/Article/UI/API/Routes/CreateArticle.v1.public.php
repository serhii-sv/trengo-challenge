<?php

/**
 * @apiGroup           Article
 * @apiName            createArticle
 *
 * @api                {POST} /v1/articles Create article
 * @apiDescription     Create new Article
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  title Title of article.
 * @apiParam           {String}  body Body content of article.
 * @apiParam           {Json}  categories ["ID1", "ID2"]
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  "data": {
    "object": "Article",
    "id": "0ybz8mpn98onlv9g",
    "created_at": "2021-03-04T09:14:05.000000Z",
    "updated_at": "2021-03-04T09:14:05.000000Z"
  },
  "meta": {
    "include": [],
    "custom": []
  }
}
 */

/** @var Route $router */
$router->post('articles', [
    'as' => 'api_article_create_article',
    'uses'  => 'Controller@createArticle',
//    'middleware' => [
//      'auth:api',
//    ],
]);
