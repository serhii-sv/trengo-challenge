<?php

namespace App\Containers\Vote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteVoteAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Vote@DeleteVoteTask', [$request->id]);
    }
}
