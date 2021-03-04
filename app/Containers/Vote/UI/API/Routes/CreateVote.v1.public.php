<?php

/**
 * @apiGroup           Vote
 * @apiName            createVote
 *
 * @api                {POST} /v1/votes Rate an article
 * @apiDescription     Endpoint to rate an article.
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  article_id [required] Id of article.
 * @apiParam           {Integer}  score [required] Score between 1 and 5.
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->post('votes', [
    'as' => 'api_vote_create_vote',
    'uses'  => 'Controller@createVote',
//    'middleware' => [
//      'auth:api',
//    ],
]);
