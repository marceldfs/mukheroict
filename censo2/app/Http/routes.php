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
    return view('pages.index');
});

Route::get("/efectivo", function(){
	return view('layout.form_efectivo');
});

Route::get("/quali", function(){
	return view('layout.form_c_efectivo_qualificacao');
});

Route::get("/experiencia", function(){
	return view('layout.form_c_efectivo_experiencia');
});
Route::get("/fami", function(){
	return view('layout.form_c_efectivo_familiares');
});

Route::get("/historico", function(){
	return view('layout.form_c_efectivo_historico');
});

Route::get("/historicoa", function(){
	return view('layout.form_c_efectivo_historico_outras');
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