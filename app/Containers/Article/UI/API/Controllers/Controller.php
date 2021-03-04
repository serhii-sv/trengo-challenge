<?php

namespace App\Containers\Article\UI\API\Controllers;

use App\Containers\Article\UI\API\Requests\CreateArticleRequest;
use App\Containers\Article\UI\API\Requests\DeleteArticleRequest;
use App\Containers\Article\UI\API\Requests\GetAllArticlesRequest;
use App\Containers\Article\UI\API\Requests\FindArticleByIdRequest;
use App\Containers\Article\UI\API\Requests\UpdateArticleRequest;
use App\Containers\Article\UI\API\Transformers\ArticleTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Article\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateArticleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createArticle(CreateArticleRequest $request)
    {
        $article = Apiato::call('Article@CreateArticleAction', [$request]);

        return $this->created($this->transform($article, ArticleTransformer::class));
    }

    /**
     * @param FindArticleByIdRequest $request
     * @return array
     */
    public function findArticleById(FindArticleByIdRequest $request)
    {
        $article = Apiato::call('Article@FindArticleByIdAction', [$request]);

        return $this->transform($article, ArticleTransformer::class);
    }

    /**
     * @param GetAllArticlesRequest $request
     * @return array
     */
    public function getAllArticles(GetAllArticlesRequest $request)
    {
        $articles = Apiato::call('Article@GetAllArticlesAction', [$request]);

        return $this->transform($articles, ArticleTransformer::class);
    }

    /**
     * @param UpdateArticleRequest $request
     * @return array
     */
    public function updateArticle(UpdateArticleRequest $request)
    {
        $article = Apiato::call('Article@UpdateArticleAction', [$request]);

        return $this->transform($article, ArticleTransformer::class);
    }

    /**
     * @param DeleteArticleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteArticle(DeleteArticleRequest $request)
    {
        Apiato::call('Article@DeleteArticleAction', [$request]);

        return $this->noContent();
    }
}
