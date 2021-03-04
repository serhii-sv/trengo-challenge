<?php

namespace App\Containers\Article\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class DatetimeToCriteria
 * @package App\Containers\Article\Data\Criterias
 */
class DatetimeToCriteria extends Criteria
{
  private $datetimeTo;

  public function __construct($datetimeTo)
  {
    $this->datetimeTo = $datetimeTo;
  }

  public function apply($model, PrettusRepositoryInterface $repository)
  {
    return $model->where('created_at', '<=', $this->datetimeTo);
  }
}
