<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'unit',
    ];

    public function sensors()
    {
        return $this->hasMany(Sensor::class);
    }
}
