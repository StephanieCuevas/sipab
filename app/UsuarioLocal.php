<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;

class UsuarioLocal extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

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

    
    protected $table = 'usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'version', 'account_expired','account_locked','dispensador','enabled','id_almacen','id_modulo','id_persona','id_sucursal','password','password_expired','username'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


}
