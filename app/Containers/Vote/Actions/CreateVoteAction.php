<?php

namespace App\Containers\Vote\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateVoteAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'article_id',
            'score',
        ]);

        $data['ip_address'] = $request->ip();

        $vote = Apiato::call('Vote@CreateVoteTask', [$data]);

        return $vote;
    }
}
