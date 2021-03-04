<?php

namespace App\Containers\Article\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class WithSpecificCategoriesCriteria
 * @package App\Containers\Article\Data\Criterias
 */
class WithSpecificCategoriesCriteria extends Criteria
{
  private $categories;

  public function __construct($categories=[])
  {
    $this->categories = $categories;
  }

  public function apply($model, PrettusRepositoryInterface $repository)
  {
    $categories = $this->categories;
    return $model->whereHas('categories', function($query) use ($categories) {
      return $query->whereIn('category_id', $categories);
    });
  }
}
