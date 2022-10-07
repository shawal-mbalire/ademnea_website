<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HiveVideo extends Model
{
    use HasFactory;
    protected $fillable = ['path', 'hive_id'];
}
