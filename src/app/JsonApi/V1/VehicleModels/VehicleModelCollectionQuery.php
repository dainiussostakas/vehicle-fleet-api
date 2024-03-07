<?php

namespace App\JsonApi\V1\VehicleModels;

use App\JsonApi\BaseResourceCollectionQuery;

class VehicleModelCollectionQuery extends BaseResourceCollectionQuery
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
