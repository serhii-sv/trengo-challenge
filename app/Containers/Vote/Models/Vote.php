<?php

namespace App\Containers\Vote\Models;

use App\Ship\Parents\Models\Model;

class Vote extends Model
{
    protected $fillable = [
      'article_id',
      'score',
      'ip_address',
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'votes';
}
