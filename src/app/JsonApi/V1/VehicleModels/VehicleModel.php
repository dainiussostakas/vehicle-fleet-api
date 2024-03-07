<?php

namespace App\JsonApi\V1\VehicleModels;

use App\JsonApi\BaseModel;
use App\JsonApi\V1\VehicleBrands\VehicleBrand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleModel extends BaseModel
{
    use HasFactory, SoftDeletes;

    public const PROPERTY_TITLE = 'title';
    public const PROPERTY_VEHICLE_BRAND = 'vehicleBrand';

    protected $fillable = [
        'title',
        'is_deleted'
    ];

    public function vehicleBrand(): BelongsTo
    {
        return $this->belongsTo(VehicleBrand::class);
    }
}
