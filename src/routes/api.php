<?php

use App\Http\Controllers\JsonApi\V1 as V1;
use LaravelJsonApi\Laravel\Facades\JsonApiRoute;
use LaravelJsonApi\Laravel\Routing\Relationships;
use LaravelJsonApi\Laravel\Routing\ResourceRegistrar;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

JsonApiRoute::server('v1')
    ->prefix('v1')
    ->resources(function (ResourceRegistrar $server) {
        $server
            ->resource('vehicles', V1\VehicleController::class)
            ->relationships(function (Relationships $relations) {
                $relations->hasOne('vehicleModel');
            });

        $server
            ->resource('vehicle-brands', V1\VehicleBrandController::class);

        $server
            ->resource('vehicle-models', V1\VehicleModelController::class)
            ->relationships(function (Relationships $relations) {
                $relations->hasOne('vehicleBrand');
            });
    });
