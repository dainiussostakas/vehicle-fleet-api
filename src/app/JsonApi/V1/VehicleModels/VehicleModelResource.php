<?php

namespace App\JsonApi\V1\VehicleModels;

use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

class VehicleModelResource extends JsonApiResource
{
    /**
     * Get the resource's relationships.
     *
     * @param Request|null $request
     * @return iterable
     */
    public function relationships($request): iterable
    {
        return [
            $this->relation(VehicleModel::PROPERTY_VEHICLE_BRAND),
        ];
    }
}
