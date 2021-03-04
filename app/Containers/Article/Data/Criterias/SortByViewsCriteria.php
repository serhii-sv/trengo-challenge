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
  private $sortOrder;
  private $sortByViewsDate;

  public function __construct($sortByViews, $sortOrder, $sortByViewsDate)
  {
    $this->sortByViews        = $sortByViews;
    $this->sortOrder   = $sortOrder;
    $this->sortByViewsDate    = $sortByViewsDate;
  }

  public function apply($model, PrettusRepositoryInterface $repository)
  {
    $sortOrder = $this->sortOrder;
    $sortByViewsDate  = $this->sortByViewsDate;


    if ($this->sortByViews != 1) {
      return $model;
    }

    if (empty($sortByViewsDate)) {
      return $model->orderBy('views_total', ($sortOrder ?? 'asc'));
    }

    return $model->join('article_popularity', 'article_popularity.article_id', '=', 'articles.id')
      ->where('article_popularity.date', '=', $sortByViewsDate)
      ->orderBy('article_popularity.views_count', ($sortOrder ?? 'asc'));
  }
}
