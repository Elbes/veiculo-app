<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Veiculos;
use App\Models\Cores;
use App\Models\Marcas;


class VeiculosController extends Controller
{
   public function index(){
    	$objReturn = null;

		$objReturn['veiculos'] = Veiculos::orderBy('dsc_modelo','desc')->paginate();

		$objReturn['cores'] = Cores::All();
       
        $objReturn['marcas'] = Marcas::All();
		return view('veiculo.lista-veiculos', ['objReturn' => $objReturn ]);
	}

	public function veiculoForm(Request $request, $id_veiculo = null) {
		$objReturn = null;
		$input = $request->All();
		$user = Auth::user();
		
		if ($id_veiculo) {
			$objReturn['veiculo'] = Veiculos::findOrFail($id_veiculo);
		}

		$objReturn['cores'] = Cores::All();
       
        $objReturn['marcas'] = Marcas::All();

		return view('veiculo.form-veiculo', ['objReturn' => $objReturn]);
	
    }

    public function create(Request $request){

    	$objReturn = null;

    	$veiculo = new Veiculos();

    	try{
            DB::BeginTransaction();

            //DADOS DO FORMULÁRIO
            $veiculo->dsc_placa       = $request->input ( 'dsc_placa' );
            $veiculo->dsc_modelo      = $request->input ( 'dsc_modelo' );
            $veiculo->dsc_versao      = $request->input ( 'dsc_versao' );
            $veiculo->marcas_id_marca = $request->input ( 'marcas_id_marca' );
            $veiculo->usuarios_id_usuario = Auth::user()->id_usuario;
            $veiculo->cores_id_cor    = $request->input ( 'cores_id_cor' );

            // SALVA OS DADOS
            if($veiculo->save()){
                Session::flash ( 'success', 'Inserido com sucesso!' );
            }
                
            DB::commit();

            }catch(\Exception $e){
                DB::rollBack();
                Session::flash ( 'error', 'Erro ao tentar realizar alteração!Tente Novamente. Erro: '. $e->getMessage() );
            }


       //BUSCA DADOS PARA PREENCHER O FORM DO MODAL
        $objReturn['cores'] = Cores::All();
       
        $objReturn['marcas'] = Marcas::All();

        $objReturn['veiculos'] = Veiculos::orderBy('dsc_modelo','desc')->paginate();

        return view('veiculo.lista-veiculos',['objReturn' => $objReturn ]);

    }

    public function destroy($id_veiculo){

        $veiculo = Veiculos::findOrFail($id_veiculo);

        try{
            DB::BeginTransaction();

            // EXCLUI OS DADOS
            if($veiculo->forcedelete()){
                Session::flash ( 'success', 'Excluído com sucesso!' );
            }
                
            DB::commit();

            }catch(\Exception $e){
                DB::rollBack();
                Session::flash ( 'error', 'Erro ao tentar realizar exclusão! Erro: '. $e->getMessage() );
            }


         //BUSCA DADOS PARA PREENCHER O FORM DO MODAL
        $objReturn['cores'] = Cores::All();
       
        $objReturn['marcas'] = Marcas::All();

        $objReturn['veiculos'] = Veiculos::orderBy('dsc_modelo','desc')->paginate();

        return view('veiculo.lista-veiculos',['objReturn' => $objReturn ]);

    }
}
