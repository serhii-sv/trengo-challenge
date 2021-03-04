<?php

namespace App\Containers\Vote\Tasks;

use App\Containers\Vote\Data\Repositories\VoteRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateVoteTask extends Task
{

    protected $repository;

    public function __construct(VoteRepository $repository)
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
