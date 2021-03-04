<?php

namespace App\Containers\Vote\Tasks;

use App\Containers\Vote\Data\Repositories\VoteRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindVoteByIdTask extends Task
{

    protected $repository;

    public function __construct(VoteRepository $repository)
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
