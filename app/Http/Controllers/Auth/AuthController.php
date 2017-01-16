<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:50',
            'password' => 'required|confirmed|min:5',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
    }
//cehacra si sirve
    public function loginPath()
    {
        return route('login');
    }

     public function redirectPath()
    {
        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return route('login');
    }


    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {


        //encriptamos una contraseña de prueba
        // $usuario=UsuarioLocal::find(121);
       //  $usuario->password=bcrypt('12345');
        // $usuario->save();

        //dd(bcrypt('12345'));
         if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

       
        return view('auth/login');
    }
    private function lockoutTime() 
{
    return property_exists($this, 'lockoutTime') ? $this->lockoutTime : 90;
}


protected function maxLoginAttempts()
{
    return property_exists($this, 'maxLoginAttempts') ? $this->maxLoginAttempts : 2;
}




public function postLogin(Request $request){
    
    if (Auth::attempt(
            [
                'username' => $request->username,
                'password' => $request->password
            ]
            , $request->has('remember')
            )){
        return redirect()->intended($this->redirectPath());
    }
    else{
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];
        
        $messages = [
            'username.required' => 'El nombre de usuario es requerido',
            'password.required' => 'La contraseña es requerida'
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        return redirect('login')
        ->withErrors($validator)
        ->withInput()
        ->with('message', 'Error al iniciar sesión');
    }
}




}
