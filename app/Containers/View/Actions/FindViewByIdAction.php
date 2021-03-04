<?php

namespace App\Containers\View\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindViewByIdAction extends Action
{
    public function run(Request $request)
    {
        $view = Apiato::call('View@FindViewByIdTask', [$request->id]);

        return $view;
    }
}
