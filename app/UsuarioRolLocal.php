<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioRolLocal extends Model
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

    
    protected $table = 'usuario_rol';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['rol_id','usuario_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */


    protected $hidden = [];
}
