<?php

namespace App\Containers\View\UI\API\Controllers;

use App\Containers\View\UI\API\Requests\CreateViewRequest;
use App\Containers\View\UI\API\Requests\DeleteViewRequest;
use App\Containers\View\UI\API\Requests\GetAllViewsRequest;
use App\Containers\View\UI\API\Requests\FindViewByIdRequest;
use App\Containers\View\UI\API\Requests\UpdateViewRequest;
use App\Containers\View\UI\API\Transformers\ViewTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\View\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateViewRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createView(CreateViewRequest $request)
    {
        $view = Apiato::call('View@CreateViewAction', [$request]);

        return $this->created($this->transform($view, ViewTransformer::class));
    }

    /**
     * @param FindViewByIdRequest $request
     * @return array
     */
    public function findViewById(FindViewByIdRequest $request)
    {
        $view = Apiato::call('View@FindViewByIdAction', [$request]);

        return $this->transform($view, ViewTransformer::class);
    }

    /**
     * @param GetAllViewsRequest $request
     * @return array
     */
    public function getAllViews(GetAllViewsRequest $request)
    {
        $views = Apiato::call('View@GetAllViewsAction', [$request]);

        return $this->transform($views, ViewTransformer::class);
    }

    /**
     * @param UpdateViewRequest $request
     * @return array
     */
    public function updateView(UpdateViewRequest $request)
    {
        $view = Apiato::call('View@UpdateViewAction', [$request]);

        return $this->transform($view, ViewTransformer::class);
    }

    /**
     * @param DeleteViewRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteView(DeleteViewRequest $request)
    {
        Apiato::call('View@DeleteViewAction', [$request]);

        return $this->noContent();
    }
}
