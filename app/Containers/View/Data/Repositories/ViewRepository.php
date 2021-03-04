<?php

namespace App\Containers\View\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ViewRepository
 */
class ViewRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
