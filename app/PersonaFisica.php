<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonaFisica extends Model
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

         protected $table = 'persona_fisica';

    protected $fillable = ['id'];


}
