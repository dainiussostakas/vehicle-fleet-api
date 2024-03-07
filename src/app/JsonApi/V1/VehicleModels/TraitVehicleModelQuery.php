<?php

namespace App\JsonApi\V1\VehicleModels;

use LaravelJsonApi\Validation\Rule as JsonApiRule;

trait TraitVehicleModelQuery
{
    function rules(): array
    {
        return [
            'include' => [
                'nullable',
                'string',
                JsonApiRule::includePaths([
                    VehicleModel::PROPERTY_VEHICLE_BRAND
                ]),
            ]
        ];
    }
}
