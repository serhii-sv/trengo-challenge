<?php

namespace App\Containers\View\Tasks;

use App\Containers\View\Data\Repositories\ViewRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateViewTask extends Task
{

    protected $repository;

    public function __construct(ViewRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
