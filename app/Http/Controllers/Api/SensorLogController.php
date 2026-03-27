<?php

namespace App\Http\Controllers\Api;

use App\Events\SensorUpdated;
use App\Http\Requests\Sensor\SensorStoreRequest;
use App\Service\SensorService;
use Exception;

class SensorLogController
{
    protected $sensorService;

    public function __construct(SensorService $sensorService)
    {
        $this->sensorService = $sensorService;
    }

    public function store (SensorStoreRequest $request) {
        try {
            $sensor = $this->sensorService->store($request->all());

            $request->device->update(['last_seen' => now()]);

            broadcast(new SensorUpdated($request->device, $sensor));

            return response()->json([
                'message' => 'Sensor successfully created!!',
                'data' => $sensor
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
