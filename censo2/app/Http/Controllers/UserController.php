<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tipo_utilizador;
use Auth;

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
        return view('pages.form_actualizar_utilizador', [
            'utilizador' => $utilizador,
            'tipo_utilizadores' => Tipo_utilizador::pluck('descricao', 'id'),
            'tipo_utilizador' => $utilizador->tipo_utilizador,
        ]);
    }
    
    public function alterar(Request $request, User $utilizador)
    {
        if($request->password!="" && $request->password_confirmation!="")
        {
        $this->validate($request, [
           'password' => 'required|min:6|confirmed',
        ]);
        $utilizador->password=bcrypt($request->password);
        }
        
        $utilizador->tipo_utilizador=$request->input('tipo_utilizador');
        
        $utilizador->save();
        return redirect('/utilizadores');
    }
    
    public function mudarSenha(Request $request)
    {
        $utilizador=Auth::user();
        return view('pages.form_mudar_senha',[
            'utilizador' => $utilizador,
            ]);
    }
    
    public function salvarSenha(Request $request)
    {
        $this->validate($request, [
           'password' => 'required|min:6|confirmed',
        ]);
        
        $utilizador=Auth::user();
        $utilizador->password=bcrypt($request->password);
        $utilizador->save();
        return redirect('/');
    }
    
    public function criarUtilizador(Request $request)
    {
        return view('pages.form_criar_utilizador',[
            'tipo_utilizadores' => Tipo_utilizador::pluck('descricao', 'id'),
        ]);
    }
    
    public function salvarUtilizador(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);
        
        $utilizador=new User();
        $utilizador->name=$request->name;
        $utilizador->email=$request->email;
        $utilizador->password=bcrypt($request->password);
        $utilizador->active=1;
        $utilizador->tipo_utilizador=$request->input('tipo_utilizador');
        
        $utilizador->save();

       return redirect('/utilizadores');
    }
}

