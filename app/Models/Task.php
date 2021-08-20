<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    <?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    protected $fillable = [
        'name', 
        'number',
        'duration',
        'description',
        'potential_innovetions',
        'deliverables',
        'interdependances',
        'resource requirements',
    


    ];

       /**
        * Get all of the tasks for the task
        *
        * @return \Illuminate\Database\Eloquent\Relations\HasMany
        */
       public function tasks()
       {
           return $this->hasMany(Task::class);
       }


}
