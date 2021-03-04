<?php

namespace App\Containers\Vote\Tasks;

use App\Containers\Article\Jobs\RecalculatePopularityJob;
use App\Containers\Article\Models\Article;
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
            $vote = $this->repository->create($data);

            Article::recalculatePopularity($data['article_id']);

            return $vote;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
