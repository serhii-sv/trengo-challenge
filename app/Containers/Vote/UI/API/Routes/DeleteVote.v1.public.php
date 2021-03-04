<?php

/**
 * @apiGroup           Vote
 * @apiName            deleteVote
 *
 * @api                {DELETE} /v1/votes/:id Endpoint title here..
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
$router->delete('votes/{id}', [
    'as' => 'api_vote_delete_vote',
    'uses'  => 'Controller@deleteVote',
    'middleware' => [
      'auth:api',
    ],
]);
