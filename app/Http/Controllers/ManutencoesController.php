<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Manutencoes;

class ManutencoesController extends Controller
{
    public function index(){
    	$data = null;
		$data['manutencoes'] = Manutencoes::orderBy('dat_entrega','desc')->paginate(5);
		return view('manutencao.lista-manutencoes', $data);
	}
}
