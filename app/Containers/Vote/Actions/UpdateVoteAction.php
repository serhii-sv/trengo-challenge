<?php

namespace App\Containers\Vote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateVoteAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $vote = Apiato::call('Vote@UpdateVoteTask', [$request->id, $data]);

        return $vote;
    }
}
