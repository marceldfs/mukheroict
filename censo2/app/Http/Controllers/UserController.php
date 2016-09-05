<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function relatorioFuncionarios(Request $request)
    {
        $utilizadores = User::all();
        
        return view('pages.form_relatorio', [
            'utilizadores' => $utilizadores,
        ]);
    }
    
    public function utilizadores(Request $request)
    {
        $utilizadores = User::all();
        
        return view('pages.form_utilizadores', [
            'utilizadores' => $utilizadores,
        ]);
    }
    
    public function activar(Request $request, User $utilizador)
    {
        if($utilizador->active==1)
        {
            $utilizador->active=0;
        }
        else
        {
           $utilizador->active=1; 
        }
        $utilizador->save();
        return redirect('/utilizadores');
    }
    
    public function apagar(Request $request, User $utilizador)
    {
        $utilizador->delete();
        return redirect('/utilizadores');
    }
    
    public function mostrar(Request $request, User $utilizador)
    {
        return view('layout.form_actualizar_utilizador', [
            'utilizador' => $utilizador,
        ]);
    }
    
    public function alterar(Request $request, User $utilizador)
    {
        $this->validate($request, [
           'password' => 'required|min:6|confirmed',
        ]);
        
        $utilizador->password=bcrypt($request->password);
        $utilizador->save();
        return redirect('/utilizadores');
    }
}

