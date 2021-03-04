<?php

/**
 * @apiGroup           Vote
 * @apiName            createVote
 *
 * @api                {POST} /v1/votes Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
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
    'middleware' => [
      'auth:api',
    ],
]);
