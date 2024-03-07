<?php

namespace App\Http\Controllers\JsonApi\V1;

use LaravelJsonApi\Contracts\Routing\Route;
use LaravelJsonApi\Contracts\Store\Store as StoreContract;
use LaravelJsonApi\Laravel\Http\Controllers\JsonApiController;

class VehicleController extends JsonApiController
{
    public function updateRelationship(Route $route, StoreContract $store)
    {
        $sss = 5;
    }

    public function updating($model, $request, $query): void
    {
        $tt = 9;

    }
}
