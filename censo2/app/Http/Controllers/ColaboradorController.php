<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;
use App\Estado_civil;
use App\Direccao;
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
use App\Funcionario_existente;
use App\Experiencia_edm_reformado;
use App\Familiar;
use App\Certificado_ensino;
use App\Instituicao_ensino;
use App\Carreira;
use App\Situacao_experiencia;
use App\Departamento;
use App\Cargo;
use App\Profissao;
use App\Qualificacao;
use App\Experiencia_edm;
use App\Historico_experiencia_outra;
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
   
    public function nameExistingFuncionario(){
        
        $codigoToCheck=Input::get('codigo');
        $responseData="";
        
        if(Funcionario_existente::where('codigo',$codigoToCheck)->exists()){
           $responseData = Funcionario_existente::where('codigo',$codigoToCheck) ->first()->nome;
        }else{                                                                    
           $responseData = "Funcionario nao existente! Coloque um codigo valido!";
        }
        
        return response()->json(array('msg'=> $responseData), 200);
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
        
        $id=$request->input('id');
        $tipo=$request->input('tipo');
        
        $pdf = App::make('dompdf.wrapper');
        
        $funcionario=Funcionario::where('id',$id)->first();
        $funcionario_existente=  Funcionario_existente::where ('codigo',$funcionario->codigo)->first();
        
        $html = '<div style="text-transform:uppercase">';
        $html = $html.'<b>Nome </b><u>'.$funcionario_existente->nome.'</u>';
        $html = $html.'<div style="text-align:right;"> <b>Codigo </b><u>'.$funcionario_existente->codigo.'</u></div>';
        
        if($tipo=="efectivo")
        {
            $html=$html.'<p style="text-align:center;">FICHA DE COLABORADORES EFECTIVO</p></div>';
            $funcionario_efectivo=Funcionario_efectivo::where('funcionario_id',$id)->first();
        }
        if($tipo=="reformado")
        {
            $html=$html.'<p style="text-align:center;">FICHA DE COLABORADORES REFORMADO</p></div>';
            $funcionario_reformado=Funcionario_reformado::where('funcionario_id',$id)->first();
        }
        if($tipo=="pensionista")
        {
            $html=$html.'<p style="text-align:center;"><b>FICHA DE COLABORADOR PENSIONISTA</b></p></div>';
            $funcionario_pensionista=Funcionario_pensionista::where('funcionario_id',$id)->first();
        }
        
            $html = $html.'<p style="text-align:center;"><i><u>Dados Pessoais</u></i></p>';
            $html = $html.'<table border="1" style="text-align:center;margin: 0 auto;" width="80%" bgcolor="#F7D358">';
            $html = $html.'<tr><td colspan="2"><i>NOMECOMPLETO</i><br>'.$funcionario->nome_completo.'</td></tr>';
            $html = $html.'<tr><td><i>PROVINCIA(Endereco)</i><br>'.Provincia::where('id',$funcionario->provincia_morada)->
                    first()->descricao.'</td>';
            $html = $html.'<td><i>DISTRITO(Endereco)</i><br>'.Distrito::where('id',$funcionario->distrito_morada)->
                    first()->descricao.'</td></tr>';
            $html = $html.'<tr><td><i>PAIS(Endereco)</i><br>'.Pais::where('id',$funcionario->pais_morada)->
                    first()->descricao.'</td>';
            $html = $html.'<td><i>LOCALIDADE(Endereco)</i><br>'.$funcionario->localidade.'</td></tr>';
            $html = $html.'<tr><td colspan="2"><i>RUA/AVENIDA (Endereco)</i><br>'.$funcionario->morada.'</td></tr>';
            $html = $html.'<tr><td><i>ESTADO CIVIL</i><br>'.Estado_civil::where('id',$funcionario->estado_civil)->
                    first()->descricao.'</td>';
            $html = $html.'<td><i>GENERO</i><br>'.Genero::where('id',$funcionario->genero)->
                    first()->descricao.'</td></tr>';
            $html = $html.'<tr><td colspan="2"><i>DATA DE NASCIMENTO</i><br>'.$funcionario->data_nascimento.'</td></tr>';
            $html = $html.'<tr><td><i>TIPO DE DOC. IDENTIFICACAO</i><br>'.Tipo_documento::where('id',$funcionario->tipo_documento)->
                    first()->descricao.'</td>';
            $html = $html.'<td><i>NUMERO DO DOCUMENTO</i><br>'.$funcionario->numero_documento.'</td></tr>';
            $html = $html.'<tr><td colspan="2"><i>NUIT</i><br>'.$funcionario->nuit.'</td></tr>';
            $html = $html.'<tr><td><i>TELEFONE/CELULAR</i><br><br><i>Numero Principal</i><br>'.$funcionario->celular;
            $html = $html.'<br><br><i>Numero Alternativo</i><br>'.$funcionario->celular_alternativo;
        
            $html = $html.'</td>';
        
            if($tipo=="efectivo")
            {
                $html = $html.'<td rowspan="1"><i>LOCAIS DE PAGAMENTO</i><br><br>METICAL<br>';
            }
            else
            {
                $html = $html.'<td rowspan="2"><i>LOCAIS DE PAGAMENTO</i><br><br>METICAL<br>';
            }
            
            $html = $html.'Banco <u>'.Banco::where('id',$funcionario->banco_mzn)->first()->descricao.'</u><br>';
            $html = $html.'Conta <u>'.$funcionario->numero_conta_mzn.'</u><br>';
            $html = $html.'NIB '.$funcionario->nib_mzn.'<br><br>';
            $html = $html.'USD<br>Banco <u>'.Banco::where('id',$funcionario->banco_usd)->first()->descricao.'</u><br>';
            $html = $html.'Conta <u>'.$funcionario->numero_conta_usd.'</u><br>';
            $html = $html.'NIB '.$funcionario->nib_usd.'<br></td></tr>';
            
         
        if($tipo=="reformado")
        {
            $html = $html.'</td></tr><tr><td><i>Valor da Pensao de Reforma</i><br><br>Pensao MZM <u>'.$funcionario_reformado->pensao_reforma_mzn;
            $html = $html.'</u><br>Pensao USD <u>'.$funcionario_reformado->pensao_reforma_usd.'</u>';
        }
        
        $html = $html.'<tr><td colspan="2"><i>EMAIL</i><br>'.$funcionario->email.'</td></tr>';
            
        if($tipo=="efectivo")
        {
            $html = $html.'<tr><td><i>NUMERO DE INSCRICAO INSS</i><br>'.$funcionario_efectivo->numero_inss.'</td>';
            $html = $html.'<td><i>TIPO SANGUINEO</i><br>'.  Tipo_sanguineo::where('id',$funcionario_efectivo->tipo_sanguineo)->
                    first()->descricao.'</td></tr>';
            $html = $html.'<tr><td><i>TIPO DE CARTA DE CONDUCAO</i><br>'.  Tipo_carta_conducao::where('id',$funcionario_efectivo->tipo_carta_conducao)->
                    first()->descricao.'</td>';
            $html = $html.'<td><i>NUMERO DE CARTA DE CONDUCAO</i><br>'.$funcionario_efectivo->numero_carta_conducao.'</td></tr>';
            $html = $html.'<tr><td colspan="2">TAMANHO EQUIPAMENTO<br><i>Camisete</i> '.Tamanho_letra::where('id',$funcionario_efectivo->tamanho_camisete)->first()->descricao;
            $html = $html.' <i>Botas</i> '.Tamanho_numero::where('id',$funcionario_efectivo->tamanho_botas)->
                    first()->descricao;
            $html = $html.' <i>Fato de Operacoes</i> '.Tamanho_letra::where('id',$funcionario_efectivo->tamanho_fato)->
                    first()->descricao;
            $html = $html.' <i>Capacete</i> '.Tamanho_numero::where('id',$funcionario_efectivo->tamanho_capacete)->
                    first()->descricao.'</td></tr>';
        }   
           
            
        $html = $html.'</table><table>';

        if($tipo=="pensionista")
        {
            $html = $html."<tr><td>Pensao em meticais: </td><td>".$funcionario_pensionista->pensao_mzn."</td></tr>";
            $html = $html."<tr><td>Pensao em dolares: </td><td>".$funcionario_pensionista->pensao_usd."</td></tr>";
            $html = $html."<tr><td>Codigo do familiar: </td><td>".$funcionario_pensionista->codigo_ex_familiar."</td></tr>";
            $html = $html."<tr><td>Nome do familiar: </td><td>".$funcionario_pensionista->nome_ex_familiar."</td></tr>";
            $html=$html."<tr><td>Parentesco: </td><td>". Parentesco::where('id',$funcionario_pensionista->parentesco)->
                    first()->descricao."</td></tr>";
            $html=$html."</table>";
        }
                
        $pdf->loadHTML($html);
        return $pdf->download('funcionario.pdf');
    }
   
   public function storeFuncionarioEfectivo(Request $request)
   {
       $this->validate($request, [
           'codigo' => 'required|exists:funcionario_existente,codigo|unique:funcionarios,codigo',
           'nome_completo' =>'required|max:75',
           'numero_documento' =>'required|max:20',
           'nuit' =>'required|digits:9',
           'numero_conta_mzn' =>'required|digits_between:7,21',
           'celular' =>'required|digits_between:8,13',
           'morada' =>'required',
           'email' =>'required|email',
           'numero_inss' =>'digits:9',
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
       
       return redirect('/efectivo2?funcionario_id='.$id);
   }
   
   public function storeFuncionarioReformado(Request $request)
   {
       $this->validate($request, [
           'codigo' => 'required|exists:funcionario_existente,codigo|unique:funcionarios,codigo',
           'nome_completo' =>'required|max:75',
           'numero_documento' =>'required|max:20',
           'nuit' =>'required|digits:9',
           'numero_conta_mzn' =>'required|digits_between:7,21',
           'celular' =>'required|digits_between:8,13',
           'morada' =>'required',
           'email' =>'required|email',
           'pensao_reforma_mzn' =>'required',
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
       
       return redirect('/reformado2?funcionario_id='.$id);
   }
   
   public function storeFuncionarioPensionista(Request $request)
   {
       $this->validate($request, [
           'codigo' => 'required|exists:funcionario_existente,codigo|unique:funcionarios,codigo',
           'nome_completo' =>'required|max:75',
           'numero_documento' =>'required|max:20',
           'nuit' =>'required|digits:9',
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
       $funcionario_pensionista->codigo_ex_familiar=$request->codigo_familiar;
       
       $nome =  Funcionario_existente::where('codigo',$request->codigo)->first()->nome;
       
       $funcionario_pensionista->nome_ex_familiar=$nome;
       $funcionario_pensionista->parentesco=$request->input('parentesco');
       
       $funcionario_pensionista->save();
       
       return view('layout.form_saved', [
            'funcionario_id' => $id,
            'tipo' => 'pensionista',
        ]);
   }
   
    public function formularioReformado2(Request $request)
    {
       return view('layout.form_reformados2', [
            'funcionario_id' => $request->funcionario_id,
            'direccoes' => Direccao::pluck('descricao', 'id'),
            'tipos_documento' => Tipo_documento::pluck('descricao', 'id'),
            'parentescos' => Parentesco::pluck('descricao', 'id'),
        ]);
    }
    
    public function storeFuncionarioReformado2(Request $request)
    {
        $experienciaEDM_reformado = new Experiencia_edm_reformado;
        $experienciaEDM_reformado->funcionario_id=$request->funcionario_id;
        $experienciaEDM_reformado->data_reforma=$request->data_reforma;
        $experienciaEDM_reformado->direccao=$request->input('direccao');
        $experienciaEDM_reformado->save();
        
        $familiar;
        if($request->nome1!="")
        {
            $familiar = New Familiar;
            $familiar->funcionario_id=$request->funcionario_id;
            $familiar->nome=$request->nome1;
            $familiar->parentesco=$request->input('parentesco1');
            $familiar->data_nascimento=$request->data_nascimento1;
            $familiar->contacto=$request->contacto1;
            $familiar->tipo_documento=$request->input('tipo_documento1');
            $familiar->numero_documento=$request->numero_documento1;
            $familiar->save();
        }
        
        if($request->nome2!="")
        {
            $familiar = New Familiar;
            $familiar->funcionario_id=$request->funcionario_id;
            $familiar->nome=$request->nome2;
            $familiar->parentesco=$request->input('parentesco2');
            $familiar->data_nascimento=$request->data_nascimento2;
            $familiar->contacto=$request->contacto2;
            $familiar->tipo_documento=$request->input('tipo_documento2');
            $familiar->numero_documento=$request->numero_documento2;
            $familiar->save();
        }
        
        if($request->nome3!="")
        {
            $familiar = New Familiar;
            $familiar->funcionario_id=$request->funcionario_id;
            $familiar->nome=$request->nome3;
            $familiar->parentesco=$request->input('parentesco3');
            $familiar->data_nascimento=$request->data_nascimento3;
            $familiar->contacto=$request->contacto3;
            $familiar->tipo_documento=$request->input('tipo_documento3');
            $familiar->numero_documento=$request->numero_documento3;
            $familiar->save();
        }
        
        if($request->nome4!="")
        {
            $familiar = New Familiar;
            $familiar->funcionario_id=$request->funcionario_id;
            $familiar->nome=$request->nome4;
            $familiar->parentesco=$request->input('parentesco4');
            $familiar->data_nascimento=$request->data_nascimento4;
            $familiar->contacto=$request->contacto4;
            $familiar->tipo_documento=$request->input('tipo_documento4');
            $familiar->numero_documento=$request->numero_documento4;
            $familiar->save();
        }
        
        if($request->nome5!="")
        {
            $familiar = New Familiar;
            $familiar->funcionario_id=$request->funcionario_id;
            $familiar->nome=$request->nome5;
            $familiar->parentesco=$request->input('parentesco5');
            $familiar->data_nascimento=$request->data_nascimento5;
            $familiar->contacto=$request->contacto5;
            $familiar->tipo_documento=$request->input('tipo_documento5');
            $familiar->numero_documento=$request->numero_documento5;
            $familiar->save();
        }
        
        return view('layout.form_saved', [
            'funcionario_id' => $request->funcionario_id,
            'tipo' => 'reformado',
        ]);
    }
    
    public function formularioEfectivo2(Request $request)
    {
       return view('layout.form_efectivo2', [
           'funcionario_id' => $request->funcionario_id,
           'instituicao' => Instituicao_ensino::pluck('descricao', 'id'),
           'certificado' => Certificado_ensino::pluck('descricao', 'id'),
           'direccao' => Direccao::pluck('descricao', 'id'),
           'situacao' => Situacao_experiencia::pluck('descricao', 'id'),
           'carreira' => Carreira::pluck('descricao', 'id'),
           'departamento' => Departamento::pluck('descricao', 'id'),
           'cargo' => Cargo::pluck('descricao', 'id'),
           'profissao' => Profissao::pluck('descricao', 'id'),
        ]);
    }
    
    public function storeFuncionarioEfectivo2(Request $request)
    {   
        $qualificacao;
        if($request->input('salvarQualificacao1')==true)
        {
            $qualificacao = New Qualificacao;
            $qualificacao->funcionario_id=$request->funcionario_id;
            $qualificacao->instituicao=$request->input('instituicao1');
            $qualificacao->curso=$request->input('curso1');
            $qualificacao->certificado=$request->input('certificado1');
            $qualificacao->data_inicio=$request->data_inicio1;
            $qualificacao->data_fim=$request->data_fim1;
            $qualificacao->save();
        }
        
        if($request->input('salvarQualificacao2')==true)
        {
            $qualificacao = New Qualificacao;
            $qualificacao->funcionario_id=$request->funcionario_id;
            $qualificacao->instituicao=$request->input('instituicao2');
            $qualificacao->curso=$request->input('curso2');
            $qualificacao->certificado=$request->input('certificado2');
            $qualificacao->data_inicio=$request->data_inicio2;
            $qualificacao->data_fim=$request->data_fim2;
            $qualificacao->save();
        }
        
        if($request->input('salvarQualificacao3')==true)
        {
            $qualificacao = New Qualificacao;
            $qualificacao->funcionario_id=$request->funcionario_id;
            $qualificacao->instituicao=$request->input('instituicao3');
            $qualificacao->curso=$request->input('curso3');
            $qualificacao->certificado=$request->input('certificado3');
            $qualificacao->data_inicio=$request->data_inicio3;
            $qualificacao->data_fim=$request->data_fim3;
            $qualificacao->save();
        }
        
        if($request->input('salvarQualificacao4')==true)
        {
            $qualificacao = New Qualificacao;
            $qualificacao->funcionario_id=$request->funcionario_id;
            $qualificacao->instituicao=$request->input('instituicao4');
            $qualificacao->curso=$request->input('curso4');
            $qualificacao->certificado=$request->input('certificado4');
            $qualificacao->data_inicio=$request->data_inicio4;
            $qualificacao->data_fim=$request->data_fim4;
            $qualificacao->save();
        }
        
        if($request->input('salvarQualificacao5')==true)
        {
            $qualificacao = New Qualificacao;
            $qualificacao->funcionario_id=$request->funcionario_id;
            $qualificacao->instituicao=$request->input('instituicao5');
            $qualificacao->curso=$request->input('curso5');
            $qualificacao->certificado=$request->input('certificado5');
            $qualificacao->data_inicio=$request->data_inicio5;
            $qualificacao->data_fim=$request->data_fim5;
            $qualificacao->save();
        }
        
        $experiencia_edm;
        if($request->input('salvarExperienciaEDM1')==true)
        {
            $experiencia_edm = New Experiencia_edm;
            $experiencia_edm->funcionario_id=$request->funcionario_id;
            $experiencia_edm->data_admissao=$request->data_admissao1;
            $experiencia_edm->data_integraccao=$request->data_integracao1;
            $experiencia_edm->situacao=$request->input('situacao1');
            $experiencia_edm->direccao=$request->input('direccao1');
            $experiencia_edm->carreira=$request->input('carreira1');
            $experiencia_edm->departamento=$request->input('departamento1');
            $experiencia_edm->cargo=$request->input('cargo1');
            $experiencia_edm->profissao=$request->input('profissao1');
            $experiencia_edm->save();
        }
        
        if($request->input('salvarExperienciaEDM2')==true)
        {
            $experiencia_edm = New Experiencia_edm;
            $experiencia_edm->funcionario_id=$request->funcionario_id;
            $experiencia_edm->data_admissao=$request->data_admissao2;
            $experiencia_edm->data_integraccao=$request->data_integracao2;
            $experiencia_edm->situacao=$request->input('situacao2');
            $experiencia_edm->direccao=$request->input('direccao2');
            $experiencia_edm->carreira=$request->input('carreira2');
            $experiencia_edm->departamento=$request->input('departamento2');
            $experiencia_edm->cargo=$request->input('cargo2');
            $experiencia_edm->profissao=$request->input('profissao2');
            $experiencia_edm->save();
        }
        
        if($request->input('salvarExperienciaEDM3')==true)
        {
            $experiencia_edm = New Experiencia_edm;
            $experiencia_edm->funcionario_id=$request->funcionario_id;
            $experiencia_edm->data_admissao=$request->data_admissao3;
            $experiencia_edm->data_integraccao=$request->data_integracao3;
            $experiencia_edm->situacao=$request->input('situacao3');
            $experiencia_edm->direccao=$request->input('direccao3');
            $experiencia_edm->carreira=$request->input('carreira3');
            $experiencia_edm->departamento=$request->input('departamento3');
            $experiencia_edm->cargo=$request->input('cargo3');
            $experiencia_edm->profissao=$request->input('profissao3');
            $experiencia_edm->save();
        }
        
        if($request->input('salvarExperienciaEDM4')==true)
        {
            $experiencia_edm = New Experiencia_edm;
            $experiencia_edm->funcionario_id=$request->funcionario_id;
            $experiencia_edm->data_admissao=$request->data_admissao4;
            $experiencia_edm->data_integraccao=$request->data_integracao4;
            $experiencia_edm->situacao=$request->input('situacao4');
            $experiencia_edm->direccao=$request->input('direccao4');
            $experiencia_edm->carreira=$request->input('carreira4');
            $experiencia_edm->departamento=$request->input('departamento4');
            $experiencia_edm->cargo=$request->input('cargo4');
            $experiencia_edm->profissao=$request->input('profissao4');
            $experiencia_edm->save();
        }
        
        if($request->input('salvarExperienciaEDM5')==true)
        {
            $experiencia_edm = New Experiencia_edm;
            $experiencia_edm->funcionario_id=$request->funcionario_id;
            $experiencia_edm->data_admissao=$request->data_admissao5;
            $experiencia_edm->data_integraccao=$request->data_integracao5;
            $experiencia_edm->situacao=$request->input('situacao5');
            $experiencia_edm->direccao=$request->input('direccao5');
            $experiencia_edm->carreira=$request->input('carreira5');
            $experiencia_edm->departamento=$request->input('departamento5');
            $experiencia_edm->cargo=$request->input('cargo5');
            $experiencia_edm->profissao=$request->input('profissao5');
            $experiencia_edm->save();
        }
        $id=$request->funcionario_id;
        
        return redirect('/efectivo3?funcionario_id='.$id);
    }
    
    public function formularioEfectivo3(Request $request)
    {
       return view('layout.form_efectivo3', [
           'funcionario_id' => $request->funcionario_id,
           'instituicao' => Instituicao_ensino::pluck('descricao', 'id'),
           'cargo' => Cargo::pluck('descricao', 'id'),
           'profissao' => Profissao::pluck('descricao', 'id'),
           'tipos_documento' => Tipo_documento::pluck('descricao', 'id'),
           'parentescos' => Parentesco::pluck('descricao', 'id'),
        ]);
    }
    
    public function storeFuncionarioEfectivo3(Request $request)
    {   
        $familiar;
        if($request->nome1!="")
        {
            $familiar = New Familiar;
            $familiar->funcionario_id=$request->funcionario_id;
            $familiar->nome=$request->nome1;
            $familiar->parentesco=$request->input('parentesco1');
            $familiar->data_nascimento=$request->data_nascimento1;
            $familiar->contacto=$request->contacto1;
            $familiar->tipo_documento=$request->input('tipo_documento1');
            $familiar->numero_documento=$request->numero_documento1;
            $familiar->save();
        }
        
        if($request->nome2!="")
        {
            $familiar = New Familiar;
            $familiar->funcionario_id=$request->funcionario_id;
            $familiar->nome=$request->nome2;
            $familiar->parentesco=$request->input('parentesco2');
            $familiar->data_nascimento=$request->data_nascimento2;
            $familiar->contacto=$request->contacto2;
            $familiar->tipo_documento=$request->input('tipo_documento2');
            $familiar->numero_documento=$request->numero_documento2;
            $familiar->save();
        }
        
        if($request->nome3!="")
        {
            $familiar = New Familiar;
            $familiar->funcionario_id=$request->funcionario_id;
            $familiar->nome=$request->nome3;
            $familiar->parentesco=$request->input('parentesco3');
            $familiar->data_nascimento=$request->data_nascimento3;
            $familiar->contacto=$request->contacto3;
            $familiar->tipo_documento=$request->input('tipo_documento3');
            $familiar->numero_documento=$request->numero_documento3;
            $familiar->save();
        }
        
        if($request->nome4!="")
        {
            $familiar = New Familiar;
            $familiar->funcionario_id=$request->funcionario_id;
            $familiar->nome=$request->nome4;
            $familiar->parentesco=$request->input('parentesco4');
            $familiar->data_nascimento=$request->data_nascimento4;
            $familiar->contacto=$request->contacto4;
            $familiar->tipo_documento=$request->input('tipo_documento4');
            $familiar->numero_documento=$request->numero_documento4;
            $familiar->save();
        }
        
        if($request->nome5!="")
        {
            $familiar = New Familiar;
            $familiar->funcionario_id=$request->funcionario_id;
            $familiar->nome=$request->nome5;
            $familiar->parentesco=$request->input('parentesco5');
            $familiar->data_nascimento=$request->data_nascimento5;
            $familiar->contacto=$request->contacto5;
            $familiar->tipo_documento=$request->input('tipo_documento5');
            $familiar->numero_documento=$request->numero_documento5;
            $familiar->save();
        }
        
        $experiencia_outra;
        if($request->input('salvarExperienciaOutra1')==true)
        {
            $experiencia_outra = New Historico_experiencia_outra;
            $experiencia_outra->funcionario_id=$request->funcionario_id;
            $experiencia_outra->data_inicio=$request->data_inicio1;
            $experiencia_outra->data_fim=$request->data_fim1;
            $experiencia_outra->instituicao=$request->input('instituicao1');
            $experiencia_outra->cargo=$request->input('cargo1');
            $experiencia_outra->profissao=$request->input('profissao1');
            $experiencia_outra->save();
        }
        if($request->input('salvarExperienciaOutra2')==true)
        {
            $experiencia_outra = New Historico_experiencia_outra;
            $experiencia_outra->funcionario_id=$request->funcionario_id;
            $experiencia_outra->data_inicio=$request->data_inicio2;
            $experiencia_outra->data_fim=$request->data_fim2;
            $experiencia_outra->instituicao=$request->input('instituicao2');
            $experiencia_outra->cargo=$request->input('cargo2');
            $experiencia_outra->profissao=$request->input('profissao2');
            $experiencia_outra->save();
        }
        if($request->input('salvarExperienciaOutra3')==true)
        {
            $experiencia_outra = New Historico_experiencia_outra;
            $experiencia_outra->funcionario_id=$request->funcionario_id;
            $experiencia_outra->data_inicio=$request->data_inicio3;
            $experiencia_outra->data_fim=$request->data_fim3;
            $experiencia_outra->instituicao=$request->input('instituicao3');
            $experiencia_outra->cargo=$request->input('cargo3');
            $experiencia_outra->profissao=$request->input('profissao3');
            $experiencia_outra->save();
        }
        if($request->input('salvarExperienciaOutra4')==true)
        {
            $experiencia_outra = New Historico_experiencia_outra;
            $experiencia_outra->funcionario_id=$request->funcionario_id;
            $experiencia_outra->data_inicio=$request->data_inicio4;
            $experiencia_outra->data_fim=$request->data_fim4;
            $experiencia_outra->instituicao=$request->input('instituicao4');
            $experiencia_outra->cargo=$request->input('cargo4');
            $experiencia_outra->profissao=$request->input('profissao4');
            $experiencia_outra->save();
        }
        if($request->input('salvarExperienciaOutra5')==true)
        {
            $experiencia_outra = New Historico_experiencia_outra;
            $experiencia_outra->funcionario_id=$request->funcionario_id;
            $experiencia_outra->data_inicio=$request->data_inicio5;
            $experiencia_outra->data_fim=$request->data_fim5;
            $experiencia_outra->instituicao=$request->input('instituicao5');
            $experiencia_outra->cargo=$request->input('cargo5');
            $experiencia_outra->profissao=$request->input('profissao5');
            $experiencia_outra->save();
        }
        
        return view('layout.form_saved', [
            'funcionario_id' => $request->funcionario_id,
            'tipo' => 'reformado',
        ]);
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
