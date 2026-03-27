<?php
namespace App\Service;

use App\Models\SensorLog;
use Illuminate\Support\Facades\DB;

class SensorService
{
    public function store (array $data) {
        return DB::transaction(function() use($data) {
            return SensorLog::create([
                'device_id' => $data['device']['id'],
                'temp' => $data['temp'],
                'humid' => $data['humid'],
                'gas_value' => $data['gas_value'],
                'gas_status' => $data['gas_status'],
                'humid_status' => $data['humid_status'],
                'temp_status' => $data['temp_status']
            ]);
        });
    }
}
