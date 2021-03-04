<?php

namespace App\Containers\Article\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteArticleAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Article@DeleteArticleTask', [$request->id]);
    }
}
