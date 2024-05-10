<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HivePhoto extends Model
{
    use HasFactory;
    protected $fillable = ['path', 'hive_id'];

    /**
     * Get the hive that owns the photo.
     */
    public function hive()
    {
        return $this->belongsTo(Hive::class);
    }
}