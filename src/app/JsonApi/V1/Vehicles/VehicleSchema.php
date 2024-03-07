<?php

namespace App\JsonApi\V1\Vehicles;

use App\JsonApi\BaseSchema;
use App\JsonApi\V1\VehicleModels\VehicleModel;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Number;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsTo;
use LaravelJsonApi\Eloquent\Fields\SoftDelete;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Filters\Where;
use LaravelJsonApi\Eloquent\Filters\WhereHas;
use LaravelJsonApi\Eloquent\SoftDeletes;
use Illuminate\Support\Str as S;

class VehicleSchema extends BaseSchema
{
    use SoftDeletes;

    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = Vehicle::class;

    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Str::make(Vehicle::PROPERTY_REGISTRATION_PLATE)->sortable(),
            Number::make(Vehicle::PROPERTY_FUEL_TANK_CAPACITY)->sortable(),
            Number::make(Vehicle::PROPERTY_AVERAGE_FUEL_CONSUMPTION)->sortable(),
            BelongsTo::make(Vehicle::PROPERTY_VEHICLE_MODEL)->notValidated()->withFilters(
                Where::make(VehicleModel::PROPERTY_ID)
            ),
            DateTime::make(Vehicle::PROPERTY_ESTIMATED_DISTANCE)->sortable()->readOnly(),
            DateTime::make(Vehicle::PROPERTY_CREATED_AT)->sortable()->readOnly(),
            DateTime::make(Vehicle::PROPERTY_UPDATED_AT)->sortable()->readOnly(),
            DateTime::make(Vehicle::PROPERTY_DELETED_AT)->sortable()->readOnly(),
            SoftDelete::make(
                Vehicle::PROPERTY_IS_DELETED,
                S::snake(Vehicle::PROPERTY_DELETED_AT)
            )->asBoolean()
        ];
    }

    public function filters(): array
    {
        return array_merge(
            parent::filters(),
            [
                Where::make(Vehicle::PROPERTY_REGISTRATION_PLATE),
                WhereHas::make($this, Vehicle::PROPERTY_VEHICLE_MODEL),
            ]
        );
    }
}
