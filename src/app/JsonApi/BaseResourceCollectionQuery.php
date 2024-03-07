<?php

namespace App\JsonApi;

use App\JsonApi\V1\VehicleModels\VehicleModel;
use App\JsonApi\V1\Vehicles\VehicleQuery;
use LaravelJsonApi\Laravel\Http\Requests\ResourceQuery;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

abstract class BaseResourceCollectionQuery extends VehicleQuery
{
    /**
     * Get the validation rules that apply to the request query parameters.
     *
     * @return array
     */
    public function rules(): array
    {
        return array_merge(
            parent::rules(),
            [
                'page' => [
                    'nullable',
                    'array',
                    JsonApiRule::page(),
                ],
                'sort' => [
                    'nullable',
                    'string',
                    JsonApiRule::sort(),
                ]
            ]
        );
    }
}
