<?php

namespace App\Containers\Article\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class SortByViewsCriteria
 * @package App\Containers\Article\Data\Criterias
 */
class SortByViewsCriteria extends Criteria
{
  private $sortByViews;
  private $sortByViewsOrder;
  private $sortByViewsDate;

  public function __construct($sortByViews, $sortByViewsOrder, $sortByViewsDate)
  {
    $this->sortByViews        = $sortByViews;
    $this->sortByViewsOrder   = $sortByViewsOrder;
    $this->sortByViewsDate    = $sortByViewsDate;
  }

  public function apply($model, PrettusRepositoryInterface $repository)
  {
    $sortByViewsOrder = $this->sortByViewsOrder;
    $sortByViewsDate  = $this->sortByViewsDate;


    if ($this->sortByViews != 1) {
      return $model;
    }

    if (empty($sortByViewsDate)) {
      return $model->orderBy('views_total', ($sortByViewsOrder ?? 'asc'));
    }

    /*
     *
     *  => function ($query) use ($sortByViewsDate, $sortByViewsOrder) {
      return $query->orderBy('views_count', ($sortByViewsOrder ?? 'asc'));
    }]
     */

    return $model->join('article_popularity', 'article_popularity.article_id', '=', 'articles.id')
      ->where('article_popularity.date', '=', $sortByViewsDate)
      ->orderBy('article_popularity.views_count', ($sortByViewsOrder ?? 'asc'));
  }
}
