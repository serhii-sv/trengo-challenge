<?php

namespace App\Containers\Article\Tasks;

use App\Containers\Article\Data\Criterias\DatetimeFromCriteria;
use App\Containers\Article\Data\Criterias\DatetimeToCriteria;
use App\Containers\Article\Data\Criterias\WithSpecificCategoriesCriteria;
use App\Containers\Article\Data\Repositories\ArticleRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllArticlesTask extends Task
{

    protected $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($categories=[], $datetime_from=null, $datetime_to=null)
    {
      if (count($categories)) {
        $this->repository->pushCriteria((new WithSpecificCategoriesCriteria($categories)));
      }

      if (null !== $datetime_from) {
        $this->repository->pushCriteria((new DatetimeFromCriteria($datetime_from)));
      }

      if (null !== $datetime_to) {
        $this->repository->pushCriteria((new DatetimeToCriteria($datetime_to)));
      }

      return $this->repository->paginate();
    }
}