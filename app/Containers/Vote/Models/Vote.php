<?php

namespace App\Containers\Vote\Models;

use App\Containers\Article\Models\Article;
use App\Ship\Parents\Models\Model;

/**
 * Class Vote
 * @package App\Containers\Vote\Models
 *
 * @property integer id
 * @property string article_id
 * @property integer score
 * @property string ip_address
 */
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article()
    {
      return $this->belongsTo(Article::class, 'article_id', 'id');
    }
}
