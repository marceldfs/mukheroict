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
use Illuminate\Http\Request;

/**
 * Show Task Dashboard
 */
Route::get('/', function () {
    $colaboradores = Colaborador::orderBy('created_at', 'asc')->get();

    return view('colaborador', [
        'colaboradores' => $colaboradores
    ]);
    
});

/**
 * Add New Task
 */
Route::post('/colaborador', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'nome' => 'required|max:255',
    ]);
    
    $validator = Validator::make($request->all(), [
        'codigo' => 'required|max:11',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    // Create The Task...
    $colaborador = new Colaborador;
    $colaborador->nome = $request->nome;
    $colaborador->codigo = $request->codigo;
    $colaborador->save();

    return redirect('/');
});

/**
 * Delete Task
 */
Route::delete('/colaborador/{colaborador}', function (Colaborador $colaborador) {
    $colaborador->delete();

    return redirect('/');
});
