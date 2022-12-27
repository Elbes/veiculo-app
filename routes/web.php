<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\View\View;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
Route::get('/', function () {
    return view('auth.login');
});

|
*/

/* ROTAS DE AUTENTICACAO DO SISTEMA*/
Route::get('/', ['App\Http\Controllers\Auth\LoginController', 'getLogin'
]);

Route::post('/entrar', ['App\Http\Controllers\Auth\LoginController', 'fazerLogin'
]);

Route::get('/logout', ['App\Http\Controllers\Auth\LoginController', 'logout'
]);

Route::get('/cadastro-usuario', ['App\Http\Controllers\UsuariosController', 'getCadastro'
]);

Route::post('/usuario-incluir', ['App\Http\Controllers\UsuariosController', 'inserir'
]);


/* ROTAS DE SISTEMA*/
Route::get('/home', ['App\Http\Controllers\HomeController', 'index']);

Route::get('/lista-manutencoes', ['App\Http\Controllers\ManutencoesController', 'index']);

Route::get('/lista-veiculos', ['App\Http\Controllers\VeiculosController', 'index']);
//Route::post('veiculo.destroy', ['App\Http\Controllers\VeiculosController', 'destroy']);
//
 Route::get('/veiculo-json', [
			'App\Http\Controllers\VeiculosController', 'getVeiculoJson'
	]);
Route::any('/inserir-veiculo',['App\Http\Controllers\VeiculosController', 'create'
]); 

Route::any('/form-veiculo/{id_veiculo?}',['App\Http\Controllers\VeiculosController', 'veiculoForm']);  

Route::any('/excluir-veiculo/{id_veiculo}',['App\Http\Controllers\VeiculosController', 'destroy'
]);  