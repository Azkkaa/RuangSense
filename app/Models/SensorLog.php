<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorLog extends Model
{
    protected $fillable = [
        'device_id',
        'temp',
        'humid',
        'gas_value',
        'temp_status',
        'humid_status',
        'gas_status',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
