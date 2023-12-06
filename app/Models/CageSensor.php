<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CageSensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'cage_id', 'sensor_id',
    ];

    public function cage()
    {
        return $this->belongsTo(Cage::class);
    }

    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
