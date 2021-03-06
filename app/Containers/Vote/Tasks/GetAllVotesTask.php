<?php

namespace App\Containers\Vote\Tasks;

use App\Containers\Vote\Data\Repositories\VoteRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllVotesTask extends Task
{

    protected $repository;

    public function __construct(VoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
