<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'sensorType_id', 'value',
    ];

    public function sensorType()
    {
        return $this->belongsTo(SensorType::class);
    }

    public function cageSensors()
    {
        return $this->hasMany(CageSensor::class);
    }
}
