<?php

namespace App\Containers\Vote\UI\API\Transformers;

use App\Containers\Vote\Models\Vote;
use App\Ship\Parents\Transformers\Transformer;

class VoteTransformer extends Transformer
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
     * @param Vote $entity
     *
     * @return array
     */
    public function transform(Vote $entity)
    {
        $response = [
            'object' => 'Vote',
            'id' => $entity->getHashedKey(),
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
