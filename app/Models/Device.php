<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'name',
        'api_key',
        'last_seen'
    ];

    public function getIsOnlineAttribute()
    {
        if (!$this->last_seen) return false;

        return Carbon::parse($this->last_seen)->diffInSeconds(now()) < 15;
    }

    public function sensorLogs()
    {
        return $this->hasMany(SensorLog::class);
    }
}
