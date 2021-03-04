<?php

namespace App\Containers\Vote\UI\API\Controllers;

use App\Containers\Vote\UI\API\Requests\CreateVoteRequest;
use App\Containers\Vote\UI\API\Requests\DeleteVoteRequest;
use App\Containers\Vote\UI\API\Requests\GetAllVotesRequest;
use App\Containers\Vote\UI\API\Requests\FindVoteByIdRequest;
use App\Containers\Vote\UI\API\Requests\UpdateVoteRequest;
use App\Containers\Vote\UI\API\Transformers\VoteTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Vote\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateVoteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createVote(CreateVoteRequest $request)
    {
        $vote = Apiato::call('Vote@CreateVoteAction', [$request]);

        return $this->created($this->transform($vote, VoteTransformer::class));
    }

    /**
     * @param FindVoteByIdRequest $request
     * @return array
     */
    public function findVoteById(FindVoteByIdRequest $request)
    {
        $vote = Apiato::call('Vote@FindVoteByIdAction', [$request]);

        return $this->transform($vote, VoteTransformer::class);
    }

    /**
     * @param GetAllVotesRequest $request
     * @return array
     */
    public function getAllVotes(GetAllVotesRequest $request)
    {
        $votes = Apiato::call('Vote@GetAllVotesAction', [$request]);

        return $this->transform($votes, VoteTransformer::class);
    }

    /**
     * @param UpdateVoteRequest $request
     * @return array
     */
    public function updateVote(UpdateVoteRequest $request)
    {
        $vote = Apiato::call('Vote@UpdateVoteAction', [$request]);

        return $this->transform($vote, VoteTransformer::class);
    }

    /**
     * @param DeleteVoteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteVote(DeleteVoteRequest $request)
    {
        Apiato::call('Vote@DeleteVoteAction', [$request]);

        return $this->noContent();
    }
}
