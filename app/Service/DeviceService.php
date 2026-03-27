<?php
namespace App\Service;

use App\Models\Device;
use Illuminate\Support\Facades\DB;

class DeviceService
{
    public function store (array $data) {
        return DB::transaction(function() use($data) {
            $successStore = Device::create([
                'name' => $data['device_name'],
                'api_key' => $data['api_key']
            ]);

            return $successStore;
        });
    }
}
