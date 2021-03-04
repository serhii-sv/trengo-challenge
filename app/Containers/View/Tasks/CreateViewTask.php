<?php

namespace App\Containers\View\Tasks;

use App\Containers\View\Data\Repositories\ViewRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateViewTask extends Task
{

    protected $repository;

    public function __construct(ViewRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
