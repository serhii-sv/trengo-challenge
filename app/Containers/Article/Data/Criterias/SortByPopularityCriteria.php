<?php

namespace App\Containers\Article\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class SortByPopularityCriteria
 * @package App\Containers\Article\Data\Criterias
 */
class SortByPopularityCriteria extends Criteria
{
  private $sortByPopularity;
  private $sortOrder;

  public function __construct($sortByPopularity, $sort_order)
  {
    $this->sortByPopularity = $sortByPopularity;
    $this->sortOrder        = $sort_order;
  }

  public function apply($model, PrettusRepositoryInterface $repository)
  {
    if ($this->sortByPopularity != 1) {
      return $model;
    }

    return $model->orderBy('popularity', ($this->sortOrder ?? 'asc'));
  }
}
