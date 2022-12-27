<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Usuarios;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    
    public function getLogin()
    {
        return view('auth.login');
            
    }
    public function logout()
    {
        Auth::logout();
        
        return Redirect::to('/');
    }
    public function fazerLogin(Request $request)
    {
        $dsc_email = $request->dsc_email;
        //$senha = $request->senha;
        $usuario = new Usuarios;
        $find = $usuario->where('dsc_email', $dsc_email)
        ->first();
        
        if ($find) // se encontrou o usuário
        {
            //verifiando a senha texto enviado pelo form
            //comparando com hash gravado no banco
            if (\Hash::check( $request->pws_senha, $find->pws_senha))
            {
                //autorizando o login do usuário.
                \Auth::login($find, true);
                
                return Redirect::to('/home');
            }else {
                Session::flash('error', 'Senha não confere!!!');
                return Redirect::to('login');
            }
        }else{
            Session::flash('error', 'Usuário não encontrado ou Inativo!!!');
            return Redirect::to('login');
        }
    }
}
