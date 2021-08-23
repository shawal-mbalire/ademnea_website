<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    protected $fillable = ['name', 'duration', 'description', 'partners', 'potential_innovations', 'deliverables', 'interdependance', 'resource_requirements'];


         /**
         * Get the workpackage that owns the task
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function workpackage()
        {
            return $this->belongsTo(WorkPackage::class,);
        }
    
}
