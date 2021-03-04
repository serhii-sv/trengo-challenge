<?php

namespace App\Containers\Article\Tasks;

use App\Containers\Article\Data\Criterias\DatetimeFromCriteria;
use App\Containers\Article\Data\Criterias\DatetimeToCriteria;
use App\Containers\Article\Data\Criterias\SortByPopularityCriteria;
use App\Containers\Article\Data\Criterias\SortByViewsCriteria;
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

    public function run($categories=[],
                        $datetime_from=null,
                        $datetime_to=null,
                        $sort_by_views=0,
                        $sort_order=null,
                        $sort_by_views_date=null,
                        $sort_by_popularity=null
    )
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

      if (0 !== $sort_by_views) {
        $this->repository->pushCriteria((new SortByViewsCriteria($sort_by_views, $sort_order, $sort_by_views_date)));
      }

      if (null !== $sort_by_popularity) {
        $this->repository->pushCriteria((new SortByPopularityCriteria($sort_by_popularity, $sort_order)));
      }

      return $this->repository->paginate();
    }
}
