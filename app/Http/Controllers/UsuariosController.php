<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Usuarios;

class UsuariosController extends Controller
{
    public function getCadastro()
    {

        return view('auth.register');

    }

     public function inserir(Request $request)
    {
    	$usuario = new Usuarios;
    	$dados = $request->All();
        try{
            DB::BeginTransaction();

            $usuario->nom_usuario   = $dados['nom_usuario'];
            $usuario->num_cpf       = $dados['num_cpf'];
            $usuario->dat_nascimento       = $dados['dat_nascimento'];
            $usuario->dsc_email       = $dados['dsc_email'];
            $usuario->pws_senha = Hash::make ( $dados['pws_senha']);
            $usuario->sit_usuario = 'A';
              
            if($usuario->save()){
                Session::flash ( 'success', 'Cadastro realizado com sucesso!!' );
                DB::commit();
            }
                
        }catch(\Exception $e){
            DB::rollBack();
            Session::flash ( 'error', 'Erro ao tentar realizar o cadastro! Erro: '. $e->getMessage() );
        }
        
		return Redirect::to ( '/' );
	}
}
