<?php

namespace App\JsonApi;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    public const PROPERTY_ID = 'id';
    public const PROPERTY_IS_DELETED = 'isDeleted';
    public const PROPERTY_CREATED_AT = 'createdAt';
    public const PROPERTY_UPDATED_AT = 'updatedAt';
    public const PROPERTY_DELETED_AT = 'deletedAt';

    public static function getTableName(): string
    {
        return (new static())->getTable();
    }
}
