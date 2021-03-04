<?php

namespace App\Containers\View\Models;

use App\Containers\Article\Models\Article;
use App\Ship\Parents\Models\Model;

/**
 * Class View
 * @package App\Containers\View\Models
 *
 * @property integer id
 * @property string article_id
 * @property string ip_address
 */
class View extends Model
{
    protected $fillable = [
      'article_id',
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
    protected $resourceKey = 'views';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article()
    {
      return $this->belongsTo(Article::class, 'article_id', 'id');
    }
}
