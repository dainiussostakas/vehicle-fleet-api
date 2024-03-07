<?php

namespace App\JsonApi\V1\Vehicles;

use App\JsonApi\V1\VehicleModels\VehicleModel;
use Illuminate\Support\Str as S;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

trait TraitVehicleQuery
{
    function rules(): array
    {
        return [
            'include' => [
                'nullable',
                'string',
                JsonApiRule::includePaths([
                    Vehicle::PROPERTY_VEHICLE_MODEL,
                    Vehicle::PROPERTY_VEHICLE_MODEL . '.' . VehicleModel::PROPERTY_VEHICLE_BRAND,
                ]),
            ]
        ];
    }
}
