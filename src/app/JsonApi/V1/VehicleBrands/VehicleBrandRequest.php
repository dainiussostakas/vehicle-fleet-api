<?php

namespace App\JsonApi\V1\VehicleBrands;

use Illuminate\Support\Str as S;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class VehicleBrandRequest extends ResourceRequest
{
    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            VehicleBrand::PROPERTY_TITLE => [
                'required', 'string'
            ],
            VehicleBrand::PROPERTY_IS_DELETED => [
                'nullable', JsonApiRule::boolean()
            ]
        ];

        $titleUniqueRule = 'unique:' .
            S::snake(VehicleBrand::getTableName()) . ',' .
            S::snake(VehicleBrand::PROPERTY_TITLE);

        if (!$this->isUpdating()) {
            $rules[VehicleBrand::PROPERTY_TITLE][] = $titleUniqueRule;
        } else {
            $rules[VehicleBrand::PROPERTY_TITLE][] = $titleUniqueRule . ',' . $this->model()->getKey();
        }

        return $rules;
    }

}
