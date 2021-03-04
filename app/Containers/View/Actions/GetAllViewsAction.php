<?php

namespace App\Containers\View\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllViewsAction extends Action
{
    public function run(Request $request)
    {
        $views = Apiato::call('View@GetAllViewsTask', [], ['addRequestCriteria']);

        return $views;
    }
}
