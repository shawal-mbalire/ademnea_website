<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HiveAudio extends Model
{
    use HasFactory;
    protected $table = 'hive_audios';
    protected $fillable = ['path', 'hive_id'];

    /**
     * Get the hive that owns the audio.
     */
    public function hive()
    {
        return $this->belongsTo(Hive::class);
    }
}