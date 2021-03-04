<?php

namespace App\Containers\View\UI\API\Transformers;

use App\Containers\View\Models\View;
use App\Ship\Parents\Transformers\Transformer;

class ViewTransformer extends Transformer
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
     * @param View $entity
     *
     * @return array
     */
    public function transform(View $entity)
    {
        $response = [
            'object' => 'View',
            'id' => $entity->getHashedKey(),
            'article_id' => $entity->article_id,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
