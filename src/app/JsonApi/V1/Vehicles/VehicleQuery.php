<?php

namespace App\JsonApi\V1\Vehicles;

use App\JsonApi\BaseResourceQuery;

class VehicleQuery extends BaseResourceQuery
{
    use TraitVehicleQuery {
        TraitVehicleQuery::rules as getVehicleRules;
    }

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return array_merge(
            parent::rules(),
            $this->getVehicleRules()
        );
    }
}
