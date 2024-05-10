<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HiveVideo extends Model
{
    use HasFactory;
    protected $fillable = ['path', 'hive_id'];

    /**
     * Get the hive that owns the video.
     */
    public function hive()
    {
        return $this->belongsTo(Hive::class);
    }
}