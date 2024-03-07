<?php

namespace App\JsonApi\V1\VehicleBrands;

use App\JsonApi\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleBrand extends BaseModel
{
    use HasFactory, SoftDeletes;

    public const PROPERTY_TITLE = 'title';

    protected $fillable = [
        'title'
    ];
}
