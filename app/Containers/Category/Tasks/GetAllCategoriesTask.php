<?php

namespace App\Containers\Category\Tasks;

use App\Containers\Category\Data\Repositories\CategoryRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllCategoriesTask extends Task
{

    protected $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
