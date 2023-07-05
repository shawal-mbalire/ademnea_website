<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HiveCarbondioxide extends Model
{
    use HasFactory;
    protected $table = 'hive_carbondioxide';
    protected $fillable = ['record', 'hive_id'];
}
