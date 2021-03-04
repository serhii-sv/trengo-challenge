<?php

namespace App\Containers\Vote\Tasks;

use App\Containers\Vote\Data\Repositories\VoteRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateVoteTask extends Task
{

    protected $repository;

    public function __construct(VoteRepository $repository)
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
