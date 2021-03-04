<?php

namespace App\Containers\Article\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllArticlesAction extends Action
{
    public function run(Request $request)
    {
        $articles = Apiato::call('Article@GetAllArticlesTask', [], ['addRequestCriteria']);

        return $articles;
    }
}
