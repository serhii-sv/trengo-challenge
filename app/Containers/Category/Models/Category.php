<?php

namespace App\Containers\Category\Models;

use App\Containers\Article\Models\Article;
use App\Ship\Parents\Models\Model;

/**
 * Class Category
 * @package App\Containers\Category\Models
 *
 * @property integer id
 * @property string title
 */
class Category extends Model
{
    protected $fillable = [
      'title',
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
    protected $resourceKey = 'categories';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
      return $this->belongsToMany(Article::class, 'category_articles', 'category_id', 'article_id');
    }
}
