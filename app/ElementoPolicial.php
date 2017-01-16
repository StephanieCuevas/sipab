<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElementoPolicial extends Model
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
    
        protected $table = 'elemento_policial';
    protected $fillable = ['id','categoria','cargo','registro_cuip','archivo_firma_digital'];
}
