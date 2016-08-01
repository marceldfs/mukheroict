<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Banco;
use App\Estado_civil;
use App\Genero;
use App\Distrito;
use App\Provincia;
use App\Tipo_carta_conducao;
use App\Tipo_documento;
use App\Pais;
use App\Tamanho_letra;
use App\Tamanho_numero;
use App\Tipo_sanguineo;
use App\Parentesco;
use App\Repositories\ColaboradorRepository;
use App\Funcionario;
use App\Funcionario_efectivo;
use App\Funcionario_reformado;
use App\Funcionario_pensionista;
use App;
use Input;
use Auth;


class ColaboradorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ColaboradorRepository $colaboradores)
    {
        $this->middleware('auth');
        
        $this->colaboradores = $colaboradores;
    }
    
    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        $users = User::pluck('name', 'id');

        return view('colaboradores.index', [
            'colaboradores' => $this->colaboradores->forUser($request->user()),
            'colaboradores2' => $this->colaboradores->forUser2($request->user()),
            'users' => $users,
        ]);
    }
    
    public function formularioEfectivo(Request $request)
    {
        return view('layout.form_efectivo', [
            'bancos' => Banco::pluck('descricao', 'id'),
            'estados_civil' => Estado_civil::pluck('descricao', 'id'),
            'generos' => Genero::pluck('descricao', 'id'),
            'provincias' => Provincia::pluck('descricao', 'id'),
            'distritos' => Distrito::pluck('descricao', 'id'),
            'tipos_documento' => Tipo_documento::pluck('descricao', 'id'),
            'tipos_carta' => Tipo_carta_conducao::pluck('descricao', 'id'),
            'paises' => Pais::pluck('descricao', 'id'),
            'tamanhos_letra' => Tamanho_letra::pluck('descricao', 'id'),
            'tamanhos_numero' => Tamanho_numero::pluck('descricao', 'id'),
            'tipos_sanguineo' => Tipo_sanguineo::pluck('descricao', 'id'),
        ]);
    }
    
    public function formularioReformado(Request $request)
    {
        return view('layout.form_reformados', [
            'bancos' => Banco::pluck('descricao', 'id'),
            'estados_civil' => Estado_civil::pluck('descricao', 'id'),
            'generos' => Genero::pluck('descricao', 'id'),
            'provincias' => Provincia::pluck('descricao', 'id'),
            'distritos' => Distrito::pluck('descricao', 'id'),
            'tipos_documento' => Tipo_documento::pluck('descricao', 'id'),
            'tipos_carta' => Tipo_carta_conducao::pluck('descricao', 'id'),
            'paises' => Pais::pluck('descricao', 'id'),
            'tamanhos_letra' => Tamanho_letra::pluck('descricao', 'id'),
            'tamanhos_numero' => Tamanho_numero::pluck('descricao', 'id'),
            'tipos_sanguineo' => Tipo_sanguineo::pluck('descricao', 'id'),
        ]);
    }
    
    public function formularioPensionista(Request $request)
    {
        return view('layout.form_pensionistas', [
            'bancos' => Banco::pluck('descricao', 'id'),
            'estados_civil' => Estado_civil::pluck('descricao', 'id'),
            'generos' => Genero::pluck('descricao', 'id'),
            'provincias' => Provincia::pluck('descricao', 'id'),
            'distritos' => Distrito::pluck('descricao', 'id'),
            'tipos_documento' => Tipo_documento::pluck('descricao', 'id'),
            'tipos_carta' => Tipo_carta_conducao::pluck('descricao', 'id'),
            'paises' => Pais::pluck('descricao', 'id'),
            'tamanhos_letra' => Tamanho_letra::pluck('descricao', 'id'),
            'tamanhos_numero' => Tamanho_numero::pluck('descricao', 'id'),
            'tipos_sanguineo' => Tipo_sanguineo::pluck('descricao', 'id'),
            'parentescos' => Parentesco::pluck('descricao', 'id'),
        ]);
    }
    
    public function preview(Request $request)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->download('invoice.pdf');
    }
   
   /**
    * Create a new task.
    *
    * @param  Request  $request
    * @return Response
    */
   public function store(Request $request)
   {
       $this->validate($request, [
           'nome' => 'required|max:255',
           //'codigo' => 'required|max:11|digits'
       ]);

       $request->user()->colaboradores()->create([
           'nome' => $request->nome,
           'codigo' => $request->input('usersList'),
       ]);

       return redirect('/colaboradores');
   }
   
   public function storeFuncionarioEfectivo(Request $request)
   {
       $this->validate($request, [
           'codigo' => 'required|exists:funcionario_existente,codigo|unique:funcionarios,codigo',
           'nome_completo' =>'required|max:75',
           'numero_documento' =>'required|max:20',
           'nuit' =>'required|digits_between:5,11',
           'numero_conta_mzn' =>'required|digits_between:7,21',
           'celular' =>'required|digits_between:8,13',
           'morada' =>'required',
           'email' =>'required|email',
           'numero_inss' =>'digits_between:5,11',
           //'codigo' => 'required|max:11|digits'
       ]);
       
       $user=Auth::user()->funcionariosCreated();
       $estado_civil=Estado_civil::where('id',$request->input('estado_civil'))->first();
       
       $funcionario=new Funcionario;
       $funcionario->codigo=$request->codigo;
       $funcionario->nome_completo=$request->nome_completo;
       $funcionario->estado_civil=$request->input('estado_civil');
       $funcionario->genero=$request->input('genero');
       $funcionario->tipo_documento=$request->input('tipo_documento');
       $funcionario->numero_documento=$request->numero_documento;
       $funcionario->nuit=$request->nuit;
       $funcionario->data_nascimento=$request->data_nascimento;
       $funcionario->provincia_naturalidade=$request->input('provincia_naturalidade');
       $funcionario->distrito_naturalidade=$request->input('distrito_naturalidade');
       $funcionario->banco_mzn=$request->input('banco_mzn');
       $funcionario->numero_conta_mzn=$request->numero_conta_mzn;
       $funcionario->banco_usd=$request->input('banco_usd');
       $funcionario->numero_conta_usd=$request->numero_conta_usd;
       $funcionario->provincia_morada=$request->input('provincia_morada');
       $funcionario->distrito_morada=$request->input('distrito_morada');
       $funcionario->pais_morada=$request->input('pais_morada');
       $funcionario->localidade=$request->localidade;
       $funcionario->celular=$request->celular;
       $funcionario->celular_alternativo=$request->celular_alternativo;
       $funcionario->morada=$request->morada;
       $funcionario->email=$request->email;
               
       $funcionario->user_created=Auth::id();
       
       $funcionario->save();
       
       $id=Funcionario::where('codigo',$request->codigo)->first()->id;
       
       $funcionario_efectivo=new Funcionario_efectivo;
       $funcionario_efectivo->funcionario_id=$id;
       $funcionario_efectivo->numero_inss=$request->numero_inss;
       $funcionario_efectivo->numero_carta_conducao=$request->numero_carta_conducao;
       $funcionario_efectivo->tipo_carta_conducao=$request->input('tipo_carta_conducao');
       $funcionario_efectivo->tamanho_camisete=$request->input('tamanho_camisete');
       $funcionario_efectivo->tamanho_botas=$request->input('tamanho_botas');
       $funcionario_efectivo->tamanho_fato=$request->input('tamanho_fato');
       $funcionario_efectivo->tamanho_capacete=$request->input('tamanho_capacete');
       $funcionario_efectivo->tipo_sanguineo=$request->input('tipo_sanguineo');
       
       $funcionario_efectivo->save();
       
       return redirect('/');
   }
   
   public function storeFuncionarioReformado(Request $request)
   {
       $this->validate($request, [
           'codigo' => 'required|exists:funcionario_existente,codigo|unique:funcionarios,codigo',
           'nome_completo' =>'required|max:75',
           'numero_documento' =>'required|max:20',
           'nuit' =>'required|digits_between:5,11',
           'numero_conta_mzn' =>'required|digits_between:7,21',
           'celular' =>'required|digits_between:8,13',
           'morada' =>'required',
           'email' =>'required|email',
           'numero_inss' =>'digits_between:5,11',
           //'codigo' => 'required|max:11|digits'
       ]);
       
       $user=Auth::user()->funcionariosCreated();
       $estado_civil=Estado_civil::where('id',$request->input('estado_civil'))->first();
       
       $funcionario=new Funcionario;
       $funcionario->codigo=$request->codigo;
       $funcionario->nome_completo=$request->nome_completo;
       $funcionario->estado_civil=$request->input('estado_civil');
       $funcionario->genero=$request->input('genero');
       $funcionario->tipo_documento=$request->input('tipo_documento');
       $funcionario->numero_documento=$request->numero_documento;
       $funcionario->nuit=$request->nuit;
       $funcionario->data_nascimento=$request->data_nascimento;
       $funcionario->provincia_naturalidade=$request->input('provincia_naturalidade');
       $funcionario->distrito_naturalidade=$request->input('distrito_naturalidade');
       $funcionario->banco_mzn=$request->input('banco_mzn');
       $funcionario->numero_conta_mzn=$request->numero_conta_mzn;
       $funcionario->banco_usd=$request->input('banco_usd');
       $funcionario->numero_conta_usd=$request->numero_conta_usd;
       $funcionario->provincia_morada=$request->input('provincia_morada');
       $funcionario->distrito_morada=$request->input('distrito_morada');
       $funcionario->pais_morada=$request->input('pais_morada');
       $funcionario->localidade=$request->localidade;
       $funcionario->celular=$request->celular;
       $funcionario->celular_alternativo=$request->celular_alternativo;
       $funcionario->morada=$request->morada;
       $funcionario->email=$request->email;
               
       $funcionario->user_created=Auth::id();
       
       $funcionario->save();
       
       $id=Funcionario::where('codigo',$request->codigo)->first()->id;
       
       $funcionario_reformado=new Funcionario_reformado;
       $funcionario_reformado->funcionario_id=$id;
       $funcionario_reformado->pensao_reforma_mzn=$request->pensao_reforma_mzn;
       $funcionario_reformado->pensao_reforma_usd=$request->pensao_reforma_usd;
       
       $funcionario_reformado->save();
       
       return redirect('/');
   }
   
   public function storeFuncionarioPensionista(Request $request)
   {
       $this->validate($request, [
           'codigo' => 'required|exists:funcionario_existente,codigo|unique:funcionarios,codigo',
           'nome_completo' =>'required|max:75',
           'numero_documento' =>'required|max:20',
           'nuit' =>'required|digits_between:5,11',
           'numero_conta_mzn' =>'required|digits_between:7,21',
           'celular' =>'required|digits_between:8,13',
           'morada' =>'required',
           'email' =>'required|email',
           'codigo_familiar' => 'required|exists:funcionario_existente,codigo',
           //'codigo' => 'required|max:11|digits'
       ]);
       
       $user=Auth::user()->funcionariosCreated();
       $estado_civil=Estado_civil::where('id',$request->input('estado_civil'))->first();
       
       $funcionario=new Funcionario;
       $funcionario->codigo=$request->codigo;
       $funcionario->nome_completo=$request->nome_completo;
       $funcionario->estado_civil=$request->input('estado_civil');
       $funcionario->genero=$request->input('genero');
       $funcionario->tipo_documento=$request->input('tipo_documento');
       $funcionario->numero_documento=$request->numero_documento;
       $funcionario->nuit=$request->nuit;
       $funcionario->data_nascimento=$request->data_nascimento;
       $funcionario->provincia_naturalidade=$request->input('provincia_naturalidade');
       $funcionario->distrito_naturalidade=$request->input('distrito_naturalidade');
       $funcionario->banco_mzn=$request->input('banco_mzn');
       $funcionario->numero_conta_mzn=$request->numero_conta_mzn;
       $funcionario->banco_usd=$request->input('banco_usd');
       $funcionario->numero_conta_usd=$request->numero_conta_usd;
       $funcionario->provincia_morada=$request->input('provincia_morada');
       $funcionario->distrito_morada=$request->input('distrito_morada');
       $funcionario->pais_morada=$request->input('pais_morada');
       $funcionario->localidade=$request->localidade;
       $funcionario->celular=$request->celular;
       $funcionario->celular_alternativo=$request->celular_alternativo;
       $funcionario->morada=$request->morada;
       $funcionario->email=$request->email;
               
       $funcionario->user_created=Auth::id();
       
       $funcionario->save();
       
       $id=Funcionario::where('codigo',$request->codigo)->first()->id;
       
       $funcionario_pensionista=new Funcionario_pensionista;
       $funcionario_pensionista->funcionario_id=$id;
       $funcionario_pensionista->pensao_mzn=$request->pensao_reforma_mzn;
       $funcionario_pensionista->pensao_usd=$request->pensao_reforma_usd;
       $funcionario_pensionista->codigo_ex_familiar=$request->codigo_ex_familiar;
       
       $nome=Funcionario::where('codigo',$request->codigo)->first()->nome;
       
       $funcionario_pensionista->nome_ex_familiar=$nome;
       $funcionario_pensionista->parentesco=$request->input('parentesco');
       
       $funcionario_pensionista->save();
       
       return redirect('/');
   }
   
    /**
    * Destroy the given task.
    *
    * @param  Request  $request
    * @param  Task  $task
    * @return Response
    */
   public function destroy(Request $request, Colaborador $colaborador)
   {
        $this->authorize('destroy', $colaborador);
        
        $colaborador->delete();

        return redirect('/colaboradores');
   }
}
