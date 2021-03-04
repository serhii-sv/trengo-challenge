<?php

namespace App\Containers\Article\Actions;

use App\Containers\Category\Models\Category;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllArticlesAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
          'categories',
          'datetime_from',
          'datetime_to',

          'sort_by_views',
          'sort_by_views_order',
          'sort_by_views_date',
        ]);

        if (!empty($data['categories'])) {
          $data['categories'] = @json_decode($data['categories']);

          foreach ($data['categories'] as $category) {
            Category::findOrFail($category);
          }
        }

        $articles = Apiato::call('Article@GetAllArticlesTask',
          [
            ($data['categories'] ?? []),
            ($data['datetime_from'] ?? null),
            ($data['datetime_to'] ?? null),

            ($data['sort_by_views'] ?? 0),
            ($data['sort_by_views_order'] ?? null),
            ($data['sort_by_views_date'] ?? null),
          ],
          ['addRequestCriteria']);

        return $articles;
    }
}
