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

Route::get('/', function () {
    return view('pages.index');
});


Route::auth();
    
Route::get('/colaboradores', 'ColaboradorController@index');
Route::get('/preview', 'ColaboradorController@preview');
Route::post('/colaborador', 'ColaboradorController@store');
Route::delete('/colaborador/{colaborador}', 'ColaboradorController@destroy');

Route::get('/home', 'HomeController@index');

Route::get("/efectivo", function(){
	return view('layout.form_efectivo');
});

Route::get("/reformados", function()
        {
            return view('layout.form_reformados');
        });
        
Route::get("/pensionistas", function()
        {
            return view('layout.form_pensionistas');
        });
Route::get("/policies", function(){
	return view('pages.policies');
});