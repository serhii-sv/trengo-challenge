<?php

namespace App\Containers\Vote\Actions;

use App\Containers\Vote\Models\Vote;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateVoteAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'article_id',
            'score',
        ]);

        $data['ip_address'] = $request->ip();

        /*
         * Check daily limits
         */
        $checkDailyLimits = Vote::where('ip_address', $data['ip_address'])
          ->where('created_at', '>=', now()->subDay())
          ->count();

        if ($checkDailyLimits > env('VOTE_DAILY_LIMIT', 10)) {
          throw new \Exception('Vote daily limit exceed.');
        }

        /*
         * Check exists votes for this IP
         */
        $checkExistsVotes = Vote::where('ip_address', $data['ip_address'])
          ->where('article_id', $data['article_id'])
          ->count();

        if ($checkExistsVotes > 0) {
          throw new \Exception('This Articles already voted');
        }

        /*
         * Register Vote
         */
        $vote = Apiato::call('Vote@CreateVoteTask', [$data]);

        return $vote;
    }
}
