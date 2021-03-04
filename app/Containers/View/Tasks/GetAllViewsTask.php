<?php

namespace App\Containers\View\Tasks;

use App\Containers\View\Data\Repositories\ViewRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllViewsTask extends Task
{

    protected $repository;

    public function __construct(ViewRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
