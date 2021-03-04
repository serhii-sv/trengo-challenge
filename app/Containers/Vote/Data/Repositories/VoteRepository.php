<?php

namespace App\Containers\Vote\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class VoteRepository
 */
class VoteRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
