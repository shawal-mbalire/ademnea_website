<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hive extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hives';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'longitude', 'latitude','farm_id'];

    /**
     * Get the farm that owns the hive.
     */
    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    /**
     * Get the photos for the hive.
     */
    public function photos()
    {
        return $this->hasMany(HivePhoto::class);
    }

    /**
     * Get the audios for the hive.
     */
    public function audios()
    {
        return $this->hasMany(HiveAudio::class);
    }

    /**
     * Get the videos for the hive.
     */
    public function videos()
    {
        return $this->hasMany(HiveVideo::class);
    }
}