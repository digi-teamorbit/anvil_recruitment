<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobinquiry extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobinquiries';

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
    protected $fillable = ['name', 'phone', 'lookingFor', 'Time', 'email', 'subject', 'file', 'job_id','job_title'];

    
}
