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
// * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
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
