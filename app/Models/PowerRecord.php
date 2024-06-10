<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PowerRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'hives_id',
        'batteryvoltage',
        'batterypercentage',
        'solarvoltagelevel'
    ];
}
