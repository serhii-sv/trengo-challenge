<?php

namespace App\Containers\Article\UI\API\Transformers;

use App\Containers\Article\Models\Article;
use App\Ship\Parents\Transformers\Transformer;

class ArticleTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param Article $entity
     *
     * @return array
     */
    public function transform(Article $entity)
    {
        $response = [
            'object' => 'Article',
            'id' => $entity->getHashedKey(),
            'title' => $entity->title,
            'body' => $entity->body,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
            'categories'  => $entity->categories()->get(), // Should be cached at Apiato level
        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
