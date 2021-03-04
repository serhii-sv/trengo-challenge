<?php

namespace App\Containers\Article\Jobs;

use App\Containers\Article\Models\Article;
use App\Containers\Article\Models\ArticlePopularity;
use App\Ship\Parents\Jobs\Job;

/**
 * Class RecalculatePopularityJob
 */
 class RecalculatePopularityJob extends Job
 {
     private $articleId;

     public function __construct($articleId)
     {
         $this->articleId = $articleId;
     }

     public function handle()
     {
       /** @var Article $article */
       $article = Article::findOrFail($this->articleId);

       $this->recordDailyViews($article);
       $this->recordTotalViews($article);
     }

     /**
      * @param Article $article
      * @return int
      */
     protected function recordDailyViews(Article $article)
     {
       $viewsCountToday = $article->views()
         ->where('created_at', '>=', now()->startOfDay())
         ->count();

       /** @var ArticlePopularity $todaysPopularityRecord */
       $todaysPopularityRecord = ArticlePopularity::where('article_id', $article->id)
         ->where('date', now()->format('Y-m-d'))
         ->first();

       if (null == $todaysPopularityRecord) {
         ArticlePopularity::create([
           'article_id'   => $article->id,
           'views_count'  => $viewsCountToday,
           'date'         => now()->toDate(),
         ]);

         return 1;
       }

       $todaysPopularityRecord->views_count = $viewsCountToday;
       $todaysPopularityRecord->save();
     }

     /**
      * @param Article $article
      */
     public function recordTotalViews(Article $article)
     {
       $article->views_total = $article->views()->count();
       $article->save();
     }

     protected function getPopularity($total, $avg)
     {
       // EXAMPLE FOR MYSELF
       // 35 1-star = 0,135135135135135
       // 63 2-star = 0,243243243243243
       // 85 3-star = 0,328185328185328 = leader
       // 45 4-star = 0,173745173745174
       // 31 2-star = 0,11969111969112
       // sum 259
     }
 }
