<?php

namespace App\JsonApi\V1\VehicleBrands;

use App\JsonApi\BaseSchema;
use Illuminate\Support\Str as S;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\SoftDelete;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Filters\Where;
use LaravelJsonApi\Eloquent\SoftDeletes;

class VehicleBrandSchema extends BaseSchema
{
    use SoftDeletes;

    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = VehicleBrand::class;

    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Str::make(VehicleBrand::PROPERTY_TITLE)->sortable(),
            DateTime::make(VehicleBrand::PROPERTY_CREATED_AT)->sortable()->readOnly(),
            DateTime::make(VehicleBrand::PROPERTY_UPDATED_AT)->sortable()->readOnly(),
            DateTime::make(VehicleBrand::PROPERTY_DELETED_AT)->sortable()->readOnly(),
            SoftDelete::make(
                VehicleBrand::PROPERTY_IS_DELETED,
                S::snake(VehicleBrand::PROPERTY_DELETED_AT)
            )->asBoolean()
        ];
    }

    public function filters(): array
    {
        return array_merge(
            parent::filters(),
            [
                Where::make(VehicleBrand::PROPERTY_ID),
                Where::make(VehicleBrand::PROPERTY_TITLE),
            ]
        );
    }
}
