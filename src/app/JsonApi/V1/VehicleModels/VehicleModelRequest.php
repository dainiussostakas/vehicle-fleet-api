<?php

namespace App\JsonApi\V1\VehicleModels;

use Illuminate\Support\Str as S;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class VehicleModelRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            VehicleModel::PROPERTY_TITLE => [
                'required',
                'string'
            ],
            VehicleModel::PROPERTY_VEHICLE_BRAND => JsonApiRule::toOne(),
            VehicleModel::PROPERTY_IS_DELETED => [
                'nullable', JsonApiRule::boolean()
            ]
        ];

        $titleUniqueRule = 'unique:' .
            S::snake(VehicleModel::getTableName()) . ',' .
            S::snake(VehicleModel::PROPERTY_TITLE);

        if (!$this->isUpdating()) {
            $rules[VehicleModel::PROPERTY_TITLE][] = $titleUniqueRule;
        } else {
            $rules[VehicleModel::PROPERTY_TITLE][] = $titleUniqueRule . ',' . $this->model()->getKey();
        }

        return $rules;
    }
}
