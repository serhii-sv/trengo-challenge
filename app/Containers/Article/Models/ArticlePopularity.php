<?php

namespace App\Containers\Article\Models;

use App\Ship\Parents\Models\Model;

/**
 * Class ArticlePopularity
 * @package App\Containers\Article\Models
 *
 * @property integer id
 * @property integer article_id
 * @property integer views_count
 * @property float popularity
 * @property string date
 */
class ArticlePopularity extends Model
{
  protected $fillable = [
    'article_id',
    'views_count',
    'popularity',
    'date',
  ];

  protected $attributes = [

  ];

  protected $hidden = [

  ];

  protected $casts = [
    'popularity' => 'popularity',
  ];

  protected $dates = [
    'created_at',
    'updated_at',
  ];

  /**
   * A resource key to be used by the the JSON API Serializer responses.
   */
  protected $resourceKey = 'article_popularities';

  protected $table = 'article_popularity';
}
