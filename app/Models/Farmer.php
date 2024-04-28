<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'fname', 'lname', 'gender', 'address', 'telephone'];

    /**
     * Get the user that owns the farmer.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function farms()
    {
        return $this->hasMany(Farm::class, 'ownerId');
    }
    
}