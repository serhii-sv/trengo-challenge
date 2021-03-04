<?php

namespace App\Containers\View\Tasks;

use App\Containers\View\Data\Repositories\ViewRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindViewByIdTask extends Task
{

    protected $repository;

    public function __construct(ViewRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
