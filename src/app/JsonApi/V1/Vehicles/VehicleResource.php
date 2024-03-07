<?php

namespace App\JsonApi\V1\Vehicles;

use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

class VehicleResource extends JsonApiResource
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
            $this->relation(Vehicle::PROPERTY_VEHICLE_MODEL),
        ];
    }
}
