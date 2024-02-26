<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HiveTemperature extends Model
{
    use HasFactory;
    protected $fillable = ['record', 'hive_id', 'created_at'];

    public function hive()
    {
        return $this->belongsTo(Hive::class);
    }

}
