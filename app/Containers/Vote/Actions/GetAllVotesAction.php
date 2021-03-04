<?php

namespace App\Containers\Vote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllVotesAction extends Action
{
    public function run(Request $request)
    {
        $votes = Apiato::call('Vote@GetAllVotesTask', [], ['addRequestCriteria']);

        return $votes;
    }
}
