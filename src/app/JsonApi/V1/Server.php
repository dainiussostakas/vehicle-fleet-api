<?php

namespace App\JsonApi\V1;

use App\JsonApi\V1\VehicleBrands\VehicleBrandSchema;
use App\JsonApi\V1\VehicleModels\VehicleModelSchema;
use App\JsonApi\V1\Vehicles\VehicleSchema;
use LaravelJsonApi\Core\Server\Server as BaseServer;

class Server extends BaseServer
{

    /**
     * The base URI namespace for this server.
     *
     * @var string
     */
    protected string $baseUri = '/api/v1';

    /**
     * Bootstrap the server when it is handling an HTTP request.
     *
     * @return void
     */
    public function serving(): void
    {
        // no-op
    }

    /**
     * Get the server's list of schemas.
     *
     * @return array
     */
    protected function allSchemas(): array
    {
        return [
            VehicleBrandSchema::class,
            VehicleModelSchema::class,
            VehicleSchema::class
        ];
    }
}
