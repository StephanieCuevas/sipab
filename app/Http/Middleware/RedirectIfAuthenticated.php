<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\UsuarioRolLocal;
use Illuminate\Contracts\Auth\Guard;

class RedirectIfAuthenticated
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
           
       //REVISAMOS QUE TIPO DE ROL TIENE ELL USUARIO Q INGRESO AL SISTEMA
             $idUsuario=$this->auth->user();
           // dd( $idUsuario->id);

           
           $rol=UsuarioRolLocal::where('usuario_id', $idUsuario->id)
               ->first();


           switch ($rol->rol_id) 
            {
                case '1':
                //Administrador
                return redirect()->to('administrador')->with('redirectPath', '/administrador');//PREFIJO DEL GRUPO
                break;
            
                case '2':
                //Reclutamiento
                return redirect()->to('reclutamiento')->with('redirectPath', '/reclutamiento');
                break;

               
                default:
                return redirect()->to('login');
                break;
            }
            return redirect('/');
        }
        return $next($request);
    }
}
