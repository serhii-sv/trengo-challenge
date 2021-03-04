<?php

namespace App\Containers\Article\Actions;

use App\Containers\View\Models\View;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindArticleByIdAction extends Action
{
    public function run(Request $request)
    {
        $article = Apiato::call('Article@FindArticleByIdTask', [$request->id]);

        View::create([
          'article_id' => $article->id,
          'ip_address' => $request->ip(),
        ]);

        return $article;
    }
}
