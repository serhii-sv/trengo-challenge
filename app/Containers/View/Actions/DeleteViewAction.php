<?php

namespace App\Containers\View\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteViewAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('View@DeleteViewTask', [$request->id]);
    }
}
