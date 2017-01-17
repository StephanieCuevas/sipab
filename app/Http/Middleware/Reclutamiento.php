<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use App\User;
use App\UsuarioRolLocal;
use Closure;
use Session;

class Reclutamiento
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $auth;
 protected $redirectPath;
    public function __construct(Guard $auth)
    {
        $this->auth=$auth;
    }
    public function handle($request, Closure $next)
    {
            $idUsuario=$this->auth->user();
            $rol=UsuarioRolLocal::where('usuario_id', $idUsuario->id)
               ->first();

           switch ($rol->rol_id) 
        {
            case '1':
                //Administrador
            return redirect()->to('administrador')->with('redirectPath', '/administrador');
            break;
            
                break;
            


               case '2':
                //Reclutamiento
                /*
                return redirect()->to('reclutamiento')->with('redirectPath', '/reclutamiento');
                break; 
                */ 
        }
        return $next($request);

    }
}
