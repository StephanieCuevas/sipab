<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatoPersonal extends Model
{
   /**
     * The database connection used by the model.
     *
     * @var string
     */
     protected $connection = 'pgsql';
 
     /**
     * The database table used by the model.
     *
     * @var string
     */
     protected $table = 'dato_personal';

    
    protected $fillable = ['id','nombre','apellido_paterno','apellido_materno','alergia','tipo_sangre','imss'];

}
