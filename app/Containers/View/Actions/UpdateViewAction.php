<?php

namespace App\Containers\View\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateViewAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $view = Apiato::call('View@UpdateViewTask', [$request->id, $data]);

        return $view;
    }
}
