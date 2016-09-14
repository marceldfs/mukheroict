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

Route::get("/policies", function(){
    return view('pages.policies');
});

Route::get("/efectivo", ['as' => 'efectivo', 'uses' => 'ColaboradorController@formularioEfectivo']);

Route::post("/efectivo", ['as' => 'efectivo', 'uses' => 'ColaboradorController@storeFuncionarioEfectivo']);

Route::get("/efectivo2", ['as' => 'efectivo', 'uses' => 'ColaboradorController@formularioEfectivo2']);

Route::post("/efectivo2", ['as' => 'efectivo', 'uses' => 'ColaboradorController@storeFuncionarioEfectivo2']);

Route::get("/efectivo3", ['as' => 'efectivo', 'uses' => 'ColaboradorController@formularioEfectivo3']);

Route::post("/efectivo3", ['as' => 'efectivo', 'uses' => 'ColaboradorController@storeFuncionarioEfectivo3']);
        
Route::get("/reformado", ['as' => 'reformado', 'uses' => 'ColaboradorController@formularioReformado']);

Route::post("/reformado", ['as' => 'reformado', 'uses' => 'ColaboradorController@storeFuncionarioReformado']);

Route::get("/reformado2", ['as' => 'reformado', 'uses' => 'ColaboradorController@formularioReformado2']);

Route::post("/reformado2", ['as' => 'reformado', 'uses' => 'ColaboradorController@storeFuncionarioReformado2']);

Route::get("/pensionista", ['as' => 'pensionista', 'uses' => 'ColaboradorController@formularioPensionista']);

Route::post("/pensionista", ['as' => 'pensionista', 'uses' => 'ColaboradorController@storeFuncionarioPensionista']);

Route::get('/getName',['as' => 'getName', 'uses' => 'ColaboradorController@nameExistingFuncionario']);

Route::get('/relatorio',['as' => 'relatorio', 'uses' => 'UserController@relatorioFuncionarios']);

Route::get('/utilizadores',['as' => 'utilizadores', 'uses' => 'UserController@utilizadores']);

Route::post('/utilizador/{utilizador}', 'UserController@activar');

Route::get('/utilizador/{utilizador}', 'UserController@mostrar');

Route::delete('/utilizador/{utilizador}', 'UserController@apagar');

Route::post('/salvarUtilizador/{utilizador}', 'UserController@alterar');

Route::get('/mudarsenha', 'UserController@mudarSenha');

Route::post('/salvarSenha', 'UserController@salvarSenha');

Route::get('/criaUtilizador', 'UserController@criarUtilizador');

Route::post('/salvarUtilizador', 'UserController@salvarUtilizador');