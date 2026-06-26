<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensors extends Model
{
    protected $primaryKey = 'SensorID'; // ← tell Laravel the real PK

    protected $keyType = 'int';

    protected $fillable = [
        'Location',
        'Temperature',
        'Humidity',
    ];
}