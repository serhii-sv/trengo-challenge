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

     /** @var ArticlePopularity */
     private $todaysPopularityRecord;

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
       $this->recordPopularity($article);
     }

     /**
      * @param Article $article
      * @return int
      */
     protected function recordDailyViews(Article $article)
     {
       $viewsCountToday = $article->views()
         ->where('created_at', '>=', now()->startOfDay()->format('Y-m-d'))
         ->count();

       /** @var ArticlePopularity $todaysPopularityRecord */
       $this->todaysPopularityRecord = ArticlePopularity::where('article_id', $article->id)
         ->where('date', now()->format('Y-m-d'))
         ->first();

       if (null == $this->todaysPopularityRecord) {
         $this->todaysPopularityRecord = ArticlePopularity::create([
           'article_id'   => $article->id,
           'views_count'  => $viewsCountToday,
           'date'         => now()->toDate(),
         ]);

         return 1;
       }

       $this->todaysPopularityRecord->views_count = $viewsCountToday;
       $this->todaysPopularityRecord->save();
     }

     /**
      * @param Article $article
      */
     public function recordTotalViews(Article $article)
     {
       $article->views_total = $article->views()->count();
       $article->save();
     }

     public function recordPopularity(Article $article)
     {
       $voteToday = [];
       $sum       = 0;

       for($i=1; $i<=5; $i++) {
         $voteToday[$i] = $article->votes()
           ->where('created_at', '>=', now()->startOfDay()->format('Y-m-d'))
           ->where('score', $i)
           ->count();
         $sum += $voteToday[$i];
       }

       if (0 == $sum) {
         return;
       }

       $ranks = [];

       for($i=1; $i<=5; $i++) {
         $ranks[$i] = $voteToday[$i] / $sum;
       }

       $currentRank = max($ranks);

       $this->todaysPopularityRecord->popularity = $currentRank;
       $this->todaysPopularityRecord->save();

       $avgPopularity = $article->articlePopularity()
         ->avg('popularity');

       $article->popularity = $avgPopularity;
       $article->save();
     }
 }
