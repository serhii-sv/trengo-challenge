<?php

/**
 * @apiGroup           Article
 * @apiName            getAllArticles
 *
 * @api                {GET} /v1/articles Get articles list
 * @apiDescription     Get articles. All or Filtered.
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
// * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->get('articles', [
    'as' => 'api_article_get_all_articles',
    'uses'  => 'Controller@getAllArticles',
//    'middleware' => [
//      'auth:api',
//    ],
]);
