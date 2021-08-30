<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\WorkPackage;

class Task extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tasks';

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
    protected $fillable = ['name','team_leader', 'duration', 'description', 'partners', 'work_package_id', 'potential_innovations', 'deliverables', 'interdependence', 'resource_requirements'];
    
}
