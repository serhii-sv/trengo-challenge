<?php

namespace App\Containers\Vote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindVoteByIdAction extends Action
{
    public function run(Request $request)
    {
        $vote = Apiato::call('Vote@FindVoteByIdTask', [$request->id]);

        return $vote;
    }
}
