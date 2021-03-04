<?php

namespace App\Containers\Article\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class DatetimeFromCriteria
 * @package App\Containers\Article\Data\Criterias
 */
class DatetimeFromCriteria extends Criteria
{
  private $datetimeFrom;

  public function __construct($datetimeFrom)
  {
    $this->datetimeFrom = $datetimeFrom;
  }

  public function apply($model, PrettusRepositoryInterface $repository)
  {
    return $model->where('created_at', '>=', $this->datetimeFrom);
  }
}
