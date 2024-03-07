<?php

namespace App\JsonApi\V1\VehicleModels;

use App\JsonApi\BaseSchema;
use App\JsonApi\V1\VehicleBrands\VehicleBrand;
use App\JsonApi\V1\Vehicles\Vehicle;
use Illuminate\Support\Str as S;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsTo;
use LaravelJsonApi\Eloquent\Fields\SoftDelete;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Filters\Where;
use LaravelJsonApi\Eloquent\Filters\WhereHas;
use LaravelJsonApi\Eloquent\SoftDeletes;

class VehicleModelSchema extends BaseSchema
{
    use SoftDeletes;

    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = VehicleModel::class;

    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Str::make(VehicleModel::PROPERTY_TITLE)->sortable(),
            BelongsTo::make(VehicleModel::PROPERTY_VEHICLE_BRAND)->notValidated()->withFilters(
                Where::make(VehicleBrand::PROPERTY_ID)
            ),
            DateTime::make(VehicleModel::PROPERTY_CREATED_AT)->sortable()->readOnly(),
            DateTime::make(VehicleModel::PROPERTY_UPDATED_AT)->sortable()->readOnly(),
            DateTime::make(VehicleModel::PROPERTY_DELETED_AT)->sortable()->readOnly(),
            SoftDelete::make(
                VehicleModel::PROPERTY_IS_DELETED,
                S::snake(VehicleModel::PROPERTY_DELETED_AT)
            )->asBoolean()
        ];
    }

    public function filters(): array
    {
        return array_merge(
            parent::filters(),
            [
                Where::make(VehicleModel::PROPERTY_ID),
                Where::make(VehicleModel::PROPERTY_TITLE),
                WhereHas::make($this, VehicleModel::PROPERTY_VEHICLE_BRAND),
            ]
        );
    }
}
