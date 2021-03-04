<?php

namespace App\Containers\Article\Actions;

use App\Containers\Category\Models\Category;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateArticleAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'title',
            'body',
            'categories',
        ]);

        if (!empty($data['categories'])) {
          $data['categories'] = @json_decode($data['categories']);

          foreach ($data['categories'] as $category) {
            Category::findOrFail($category);
          }
        }

        $article = Apiato::call('Article@CreateArticleTask', [$data]);

        return $article;
    }
}
