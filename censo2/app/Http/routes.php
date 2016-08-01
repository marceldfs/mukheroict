<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Colaborador;
use App\Funcionario;
use Illuminate\Http\Request;

Route::get('/', function () {
    if(Auth::check())
    {
        $user = Auth::user();

        $funcionariosInseridos = $user->FuncionariosCreated()->get();


        return view('pages.index',[
            'funcionariosInseridos'=>$funcionariosInseridos,
        ]);
    }
    else{
        return view('pages.index');
    }
});

Route::auth();
    
Route::get('/colaboradores', 'ColaboradorController@index');
Route::get('/preview', 'ColaboradorController@preview');
Route::post('/colaborador', 'ColaboradorController@store');
Route::delete('/colaborador/{colaborador}', 'ColaboradorController@destroy');

Route::get('/home', 'HomeController@index');

Route::get("/efectivo", ['as' => 'efectivo', 'uses' => 'ColaboradorController@formularioEfectivo']);

Route::post("/efectivo", ['as' => 'efectivo', 'uses' => 'ColaboradorController@storeFuncionarioEfectivo']);
        
Route::get("/reformado", ['as' => 'reformado', 'uses' => 'ColaboradorController@formularioReformado']);

Route::post("/reformado", ['as' => 'reformado', 'uses' => 'ColaboradorController@storeFuncionarioReformado']);

Route::get("/pensionista", ['as' => 'pensionista', 'uses' => 'ColaboradorController@formularioPensionista']);

Route::post("/pensionista", ['as' => 'pensionista', 'uses' => 'ColaboradorController@storeFuncionarioPensionista']);
    
Route::get("/policies", function(){
	return view('pages.policies');
});