<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolLocal extends Model
{
	/**
     * The database connection used by the model.
     *
     * @var string
     */
     protected $connection = 'respaldo';
 
     /**


     /**
     * The database table used by the model.
     *
     * @var string
     */

    
    protected $table = 'rol';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','version','authority','descripcion_rol'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */


    protected $hidden = [];
}
