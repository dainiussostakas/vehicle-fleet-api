<?php

namespace App\JsonApi\V1\Vehicles;

use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;
use  Illuminate\Support\Str as S;

class VehicleRequest extends ResourceRequest
{
    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            Vehicle::PROPERTY_REGISTRATION_PLATE => [
                'required',
                'string',
            ],
            Vehicle::PROPERTY_FUEL_TANK_CAPACITY => [
                'required',
                'decimal:0,3',
                'between:0,10000'
            ],
            Vehicle::PROPERTY_AVERAGE_FUEL_CONSUMPTION => [
                'required',
                'decimal:0,3',
                'between:0,1000'
            ],
            Vehicle::PROPERTY_VEHICLE_MODEL => [
                JsonApiRule::toOne()
            ],
            Vehicle::PROPERTY_IS_DELETED => [
                'nullable', JsonApiRule::boolean()
            ]
        ];

        $registrationPlateUniqueRule = 'unique:' .
            S::snake(Vehicle::getTableName()) . ',' .
            S::snake(Vehicle::PROPERTY_REGISTRATION_PLATE);

        if (!$this->isUpdating()) {
            $rules[Vehicle::PROPERTY_VEHICLE_MODEL][] = 'required';
            $rules[Vehicle::PROPERTY_REGISTRATION_PLATE][] = $registrationPlateUniqueRule;
        } else {
            $rules[Vehicle::PROPERTY_REGISTRATION_PLATE][] = $registrationPlateUniqueRule . ',' . $this->model()->getKey();
        }

        return $rules;
    }
}
