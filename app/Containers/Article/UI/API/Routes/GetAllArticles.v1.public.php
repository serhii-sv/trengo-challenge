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
 * @apiParam           {Json}  categories [optional] FILTERING ["ID1", "ID2"]
 * @apiParam           {String} datetime_from [optional] FILTERING by date from  2020-01-01 00:00:01
 * @apiParam           {String} datetime_to [optional] FILTERING by date to  2022-01-01 00:00:01
 * @apiParam           {Integer} sort_by_views [optional] SORTING by views count 0 or 1
 * @apiParam           {Integer} sort_by_views_date [optional] SORTING by views specific date. Example 2021-03-05
 * @apiParam           {Integer} sort_by_popularity [optional] SORTING by popularity (relevant). 1 or 0
 * @apiParam           {Integer} sort_order [optional] SORTING ORDER asc, desc
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
"data": [
  {
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
    }
    ],
      "meta": {
        "include": [],
        "custom": [],
        "pagination": {
        "total": 1000,
        "count": 1,
        "per_page": 1,
        "current_page": 1,
        "total_pages": 1000,
        "links": {
        "next": "http://api.trengo-challenge.test:85/v1/articles?limit=1&page=2"
      }
    }
  }
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
