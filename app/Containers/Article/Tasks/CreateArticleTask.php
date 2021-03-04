<?php

namespace App\Containers\Article\Tasks;

use App\Containers\Article\Data\Repositories\ArticleRepository;
use App\Containers\Category\Models\Category;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateArticleTask extends Task
{

    protected $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            $article = $this->repository->create($data);

            if (!empty($data['categories'])) {
              foreach ($data['categories'] as $categoryId) {
                $article->categories()->attach($categoryId);
              }
            }

            return $article;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
