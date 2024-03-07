<?php

namespace App\JsonApi\V1\Vehicles;

use App\JsonApi\BaseModel;
use App\JsonApi\V1\VehicleModels\VehicleModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;



class Vehicle extends BaseModel
{
    use HasFactory, SoftDeletes;

    public const PROPERTY_REGISTRATION_PLATE = 'registrationPlate';
    public const PROPERTY_FUEL_TANK_CAPACITY = 'fuelTankCapacity';
    public const PROPERTY_AVERAGE_FUEL_CONSUMPTION = 'averageFuelConsumption';
    public const PROPERTY_ESTIMATED_DISTANCE = 'estimatedDistance';
    public const PROPERTY_VEHICLE_MODEL = 'vehicleModel';

    protected $fillable = [
        'registration_plate',
        'fuel_tank_capacity',
        'average_fuel_consumption',
        'is_deleted'
    ];

    protected $appends = [
        'estimated_distance'
    ];

    public function vehicleModel(): BelongsTo
    {
        return $this->belongsTo(VehicleModel::class);
    }

    public function getEstimatedDistanceAttribute(): float
    {
        if ($this->average_fuel_consumption <= 0) {
            return 0;
        }

        return round($this->fuel_tank_capacity / $this->average_fuel_consumption * 100, 3);
    }
}
