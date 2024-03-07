<?php

namespace App\JsonApi\V1\VehicleModels;

use App\JsonApi\BaseResourceQuery;

class VehicleModelQuery extends BaseResourceQuery
{
    use TraitVehicleModelQuery {
        TraitVehicleModelQuery::rules as getVehicleModelRules;
    }

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return array_merge(
            parent::rules(),
            $this->getVehicleModelRules()
        );
    }
}
