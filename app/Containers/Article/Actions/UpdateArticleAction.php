<?php

namespace App\Containers\Article\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateArticleAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $article = Apiato::call('Article@UpdateArticleTask', [$request->id, $data]);

        return $article;
    }
}
