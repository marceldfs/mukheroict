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
use App\Historico_experiencia_edm;
use App\Historico_experiencia_outra;
use App\Tipo_funcionario;
use App;
use Input;
use Auth;
use Carbon\Carbon;


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
        $tipoFuncionario=Input::get('tipo_funcionario');
        $responseData="";
        
        if(Funcionario_existente::where('codigo',$codigoToCheck)->exists()){
            if(Tipo_funcionario::where('id',Funcionario_existente::where('codigo',$codigoToCheck)->first()->tipo_funcionario_id)->first()->tipo==$tipoFuncionario)
            {
                $responseData = Funcionario_existente::where('codigo',$codigoToCheck) ->first()->nome;
            }
            else
            {
                $responseData = "Funcionario nao existente! Coloque um codigo valido!";
            }
        }else{                                                                    
           $responseData = "Funcionario nao existente! Coloque um codigo valido!";
        }
        
        return response()->json(array('msg'=> $responseData), 200);
    }
    
    public function codigoExistingFuncionario(){
        
        $codigoToCheck=Input::get('codigo');
        $tipoFuncionario='Falecido';
        $responseData="";
        
        if(Funcionario_existente::where('codigo',$codigoToCheck)->exists()){
            if(Tipo_funcionario::where('id',Funcionario_existente::where('codigo',$codigoToCheck)->first()->tipo_funcionario_id)->first()->tipo==$tipoFuncionario)
            {
                $responseData = Funcionario_existente::where('codigo',$codigoToCheck) ->first()->codigo;
            }
            else
            {
                $responseData = "";
            }
        }else{                                                                    
           $responseData = "";
        }
        
        return response()->json(array('msg'=> $responseData), 200);
    }
    
    public function formularioEfectivo(Request $request)
    {
        $funcionario_efectivo = new Funcionario_efectivo;
        $funcionario = new Funcionario;
        
        return view('layout.form_efectivo', [
            'bancos' => Banco::pluck('descricao', 'id'),
            'estados_civil' => Estado_civil::pluck('descricao', 'id'),
            'generos' => Genero::pluck('descricao', 'id'),
            'provincias' => Provincia::pluck('descricao', 'id'),
            'distritos_naturalidade' => Distrito::pluck('descricao', 'id'),
            'distritos_morada' => Distrito::pluck('descricao', 'id'),
            'tipos_documento' => Tipo_documento::pluck('descricao', 'id'),
            'tipos_carta' => Tipo_carta_conducao::pluck('descricao', 'id'),
            'paises' => Pais::pluck('descricao', 'id'),
            'tamanhos_letra' => Tamanho_letra::pluck('descricao', 'id'),
            'tamanhos_numero' => Tamanho_numero::pluck('descricao', 'id'),
            'tipos_sanguineo' => Tipo_sanguineo::pluck('descricao', 'id'),
            'funcionario_efectivo' => $funcionario_efectivo,
            'funcionario' => $funcionario,
            'tipo_funcionario' =>'Efectivo',
        ]);
    }
    
    public function formularioReformado(Request $request)
    {
        $funcionario_reformado = new Funcionario_reformado;
        $funcionario = new Funcionario;
        
        return view('layout.form_reformados', [
            'bancos' => Banco::pluck('descricao', 'id'),
            'estados_civil' => Estado_civil::pluck('descricao', 'id'),
            'generos' => Genero::pluck('descricao', 'id'),
            'provincias' => Provincia::pluck('descricao', 'id'),
            'distritos_naturalidade' => Distrito::pluck('descricao', 'id'),
            'distritos_morada' => Distrito::pluck('descricao', 'id'),
            'tipos_documento' => Tipo_documento::pluck('descricao', 'id'),
            'tipos_carta' => Tipo_carta_conducao::pluck('descricao', 'id'),
            'paises' => Pais::pluck('descricao', 'id'),
            'tamanhos_letra' => Tamanho_letra::pluck('descricao', 'id'),
            'tamanhos_numero' => Tamanho_numero::pluck('descricao', 'id'),
            'tipos_sanguineo' => Tipo_sanguineo::pluck('descricao', 'id'),
            'funcionario_reformado' => $funcionario_reformado,
            'funcionario' => $funcionario,
            'tipo_funcionario' =>'Reformado',
        ]);
    }
    
    public function formularioPensionista(Request $request)
    {
        $funcionario_pensionista = new Funcionario_pensionista;
        $funcionario = new Funcionario;  
        
        return view('layout.form_pensionistas', [
            'bancos' => Banco::pluck('descricao', 'id'),
            'estados_civil' => Estado_civil::pluck('descricao', 'id'),
            'generos' => Genero::pluck('descricao', 'id'),
            'provincias' => Provincia::pluck('descricao', 'id'),
            'distritos_naturalidade' => Distrito::pluck('descricao', 'id'),
            'distritos_morada' => Distrito::pluck('descricao', 'id'),
            'tipos_documento' => Tipo_documento::pluck('descricao', 'id'),
            'tipos_carta' => Tipo_carta_conducao::pluck('descricao', 'id'),
            'paises' => Pais::pluck('descricao', 'id'),
            'tamanhos_letra' => Tamanho_letra::pluck('descricao', 'id'),
            'tamanhos_numero' => Tamanho_numero::pluck('descricao', 'id'),
            'tipos_sanguineo' => Tipo_sanguineo::pluck('descricao', 'id'),
            'parentescos' => Parentesco::pluck('descricao', 'id'),
            'funcionario_pensionista' => $funcionario_pensionista,
            'funcionario' => $funcionario,
            'tipo_funcionario' =>'Pensionista',
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
            
        if($tipo=="pensionista")
        {
            $html = $html.'<tr><td colspan="2"><i>NOME DO EX-FAMILIAR NA EMPRESA</i><br>'.$funcionario_pensionista->nome_ex_familiar.'</td></tr>';
            $html = $html.'<tr><td><i>PARENTESCO DO EX-FAMILIAR NA EMPRESA</i><br>'.Parentesco::where('id',$funcionario_pensionista->parentesco)->
                    first()->descricao.'</td>';
            $html = $html.'<td><i>CODIGO DO EX-FAMILIAR</i><br>'.$funcionario_pensionista->codigo_ex_familiar.'</td></tr>';
        }
            
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
        
        if($tipo=="pensionista")
        {
            $html = $html.'</td></tr><tr><td><i>Valor da Pensao</i><br><br>Pensao MZM <u>'.$funcionario_pensionista->pensao_mzn;
            $html = $html.'</u><br>Pensao USD <u>'.$funcionario_pensionista->pensao_usd.'</u>';
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
           
        $html = $html.'</table>';
        
        $html = $html.'<br><div style="">Confirmo que todos dados preenchidos acima sao fiaveis e verdadeiros</div>';
        $html = $html.'<div style="text-align:right;page-break-after: always;">____________________________________________</div>';
        
        if($tipo == "reformado")
        {
            $experiencia_edm_reformado = Experiencia_edm_reformado::where('funcionario_id',$funcionario_reformado->funcionario_id)->first();
            $direccao = Direccao::where('id',$experiencia_edm_reformado->direccao)->first();
            $familiares = Familiar::where('funcionario_id',$funcionario_reformado->id)->get();
            
            $html = $html.'<div style="text-transform:uppercase">';
            $html = $html.'<b>Nome </b><u>'.$funcionario_existente->nome.'</u>';
            $html = $html.'<div style="text-align:right;"> <b>Codigo </b><u>'.$funcionario_existente->codigo.'</u></div>';
            $html = $html.'<p style="text-align:center;"><i>EXPERI&Ecirc;NCIA PROFISSIONAL(EDM)</i></p>';
            $html = $html.'<table border="1" style="text-align:center;margin: 0 auto;" width="80%" bgcolor="#F7D358">';
            $html = $html.'<tr><td colspan="2"><i>DATA DA REFORMA (EDM):</i><br>'.$experiencia_edm_reformado->data_reforma.'</td></tr>';
            $html = $html.'<tr><td colspan="2"><i>DIRECCAO ONDE REFORMOU:</i><br>'.$direccao->descricao.'</td></tr>';
            $html = $html.'</table><br>';
            $html = $html.'<p style="text-align:center;"><i>DADOS FAMILIARES</i></p>';
            $html = $html.'<p style="text-align:center;"><i><u>AGREGADO FAMILIAR</u></i></p>';
            $html = $html.'<table border="1" style="text-align:center;margin: 0 auto;" width="80%" >';
            $html = $html.'<tr bgcolor="#F7D358"><td>NOME</td><td>PARENTESCO</td><td>DATA NASCIMENTO</td><td>CONTACTO</td><td>DOCUMENTO SUPORTE</td></tr>';
            
            foreach ($familiares as $familiar)
            {
                $html = $html.'<tr><td>'.$familiar->nome.'</td><td>'.Parentesco::where('id',$familiar->parentesco)->first()->descricao.'</td>';
                $html = $html.'<td>'.$familiar->data_nascimento.'</td><td>'.$familiar->contacto.'</td>';
                $html = $html.'<td>'.  Tipo_documento::where('id',$familiar->tipo_documento)->first()->descricao.'</td></tr>';
            }
            $html = $html.'</table';
        }
        
        if($tipo=="efectivo")
        {
            $qualificacoes = Qualificacao::where('funcionario_id',$funcionario_efectivo->funcionario_id)->get();
            
            $html = $html.'<div style="text-transform:uppercase">';
            $html = $html.'<b>Nome </b><u>'.$funcionario_existente->nome.'</u>';
            $html = $html.'<div style="text-align:right;"> <b>Codigo </b><u>'.$funcionario_existente->codigo.'</u></div>';
            $html = $html.'<p style="text-align:center;"><u>Qualifica&Ccedil;&Otilde;es Acad&Eacute;micas e Profissionais</u></p>';
            $html = $html.'<p style="text-align:center;"><i>HIST&Oacute;RICO DE HABILITA&Ccedil;&Otilde;ES</i></p>';
            $html = $html.'<table border="1" style="text-align:center;margin: 0 auto;page-break-after: always;" width="80%" >';
            $html = $html.'<tr bgcolor="#F7D358"><td>INSTITUI&Ccedil;&Atilde;O</td><td>CURSO</td><td>CERTIFICA&Ccedil;&Atilde;O (Grau)</td><td>DATA INICIO</td><td>DATA FIM</td></tr>';
        
            foreach ($qualificacoes as $qualificacao)
            {
                $html = $html.'<tr><td>'.Instituicao_ensino::where('id',$qualificacao->instituicao)->first()->descricao.'</td>';
                $html = $html.'<td>'.$qualificacao->curso.'</td>';
                $html = $html.'<td>'.Certificado_ensino::where('id',$qualificacao->certificado)->first()->descricao.'</td>';
                $html = $html.'<td>'.$qualificacao->data_inicio.'</td><td>'.$qualificacao->data_fim.'</td></tr>';
            }
            $html = $html.'</table';
            
            $experiencia_edm = Experiencia_edm::where('funcionario_id',$funcionario_efectivo->funcionario_id)->first();
            
            $html = $html.'<div style="text-transform:uppercase">';
            $html = $html.'<b>Nome </b><u>'.$funcionario_existente->nome.'</u>';
            $html = $html.'<div style="text-align:right;"> <b>Codigo </b><u>'.$funcionario_existente->codigo.'</u></div>';
            $html = $html.'<p style="text-align:center;">EXPERI&Ecirc;NCIA PROFISSIONAL(EDM)</p>';
            $html = $html.'<table border="1" style="text-align:center;margin: 0 auto;page-break-after: always;" bgcolor="#F7D358" width="80%">';
            $html = $html.'<tr><td><i>DATA DE ADMISS&Atilde;O (EDM)</i><br>'.$experiencia_edm->data_admissao.'</td></tr>';
            $html = $html.'<tr><td><i>DATA DE INTEGRA&Ccedil;&Atilde;O AO QUADRO EMPRESA</i><br>'.$experiencia_edm->data_integraccao.'</td></tr>';
            $html = $html.'<tr><td><i>SITUA&Ccedil;&Atilde;O</i><br>'.Situacao_experiencia::where('id',$experiencia_edm->situacao)->first()->descricao.'</td></tr>';
            $html = $html.'<tr><td><i>CARREIRA</i><br>'.Carreira::where('id',$experiencia_edm->carreira)->first()->descricao.'</td></tr>';
            $html = $html.'<tr><td><i>CARGO/ FUN&Ccedil;&Atilde;O</i><br>'.  Cargo::where('id',$experiencia_edm->cargo)->first()->descricao.'</td></tr>';
            $html = $html.'<tr><td><i>PROFISS&Atilde;O</i><br>'.  Profissao::where('id',$experiencia_edm->profissao)->first()->descricao.'</td></tr>';
            $html = $html.'<tr><td><i>DIREC&Ccedil;&Atilde;O (Actual)</i><br>'. Direccao::where('id',$experiencia_edm->direccao)->first()->descricao.'</td></tr>';
            $html = $html.'<tr><td><i>DEPARTAMENTO (Actual)</i><br>'. Departamento::where('id',$experiencia_edm->departamento)->first()->descricao.'</td></tr>';
            $html = $html.'</table';
            
            $historico_experiencia_edms = Historico_experiencia_edm::where('funcionario_id',$funcionario_efectivo->funcionario_id)->get();
            
            $html = $html.'<div style="text-transform:uppercase">';
            $html = $html.'<b>Nome </b><u>'.$funcionario_existente->nome.'</u>';
            $html = $html.'<div style="text-align:right;"> <b>Codigo </b><u>'.$funcionario_existente->codigo.'</u></div>';
            $html = $html.'<p style="text-align:center;">Hist&Oacute;rico Experiencia Profissional (EDM)</p>';
            
            $html = $html.'<table border="1" style="text-align:center;margin: 0 auto;page-break-after: always;" width="80%" >';
            $html = $html.'<tr bgcolor="#F7D358"><td>DIREC&Ccedil;&Atilde;O</td><td>DEPARTAMENTO</td><td>CARGO / FUN&Ccedil;&Atilde;O</td><td>DATA INICIO</td><td>DATA FIM</td></tr>';
        
            foreach ($historico_experiencia_edms as $historico_experiencia_edm)
            {
                $html = $html.'<tr><td>'.  Direccao::where('id',$historico_experiencia_edm->direccao)->first()->descricao.'</td>';
                $html = $html.'<td>'.  Departamento::where('id',$historico_experiencia_edm->departamento)->first()->descricao.'</td>';
                $html = $html.'<td>'.Cargo::where('id',$historico_experiencia_edm->cargo)->first()->descricao.'</td>';
                $html = $html.'<td>'.$historico_experiencia_edm->data_inicio.'</td><td>'.$historico_experiencia_edm->data_fim.'</td></tr>';
            }
            $html = $html.'</table';
            
            $historico_experiencia_outras = Historico_experiencia_outra::where('funcionario_id',$funcionario_efectivo->funcionario_id)->get();
            
            $html = $html.'<div style="text-transform:uppercase">';
            $html = $html.'<b>Nome </b><u>'.$funcionario_existente->nome.'</u>';
            $html = $html.'<div style="text-align:right;"> <b>Codigo </b><u>'.$funcionario_existente->codigo.'</u></div>';
            $html = $html.'<p style="text-align:center;">EXPERI&Ecirc;NCIA PROFISSIONAL (Outras Empresas / Institui&Ccedil;&Otilde;es e S.M.O)</p>';
            $html = $html.'<p style="text-align:center;">Hist&Oacute;rico Experi&Ecirc;ncia Profissional</p>';
            
            $html = $html.'<table border="1" style="text-align:center;margin: 0 auto;page-break-after: always;" width="80%" >';
            $html = $html.'<tr bgcolor="#F7D358"><td>INSTITUI&Ccedil;&Atilde;O</td><td>CARGO / FUN&Ccedil;&Atilde;O</td><td>DATA INICIO</td><td>DATA FIM</td></tr>';
            
            foreach ($historico_experiencia_outras as $historico_experiencia_outra)
            {
                $html = $html.'<tr><td>'.  $historico_experiencia_outra->instituicao.'</td>';
                $html = $html.'<td>'.  $historico_experiencia_outra->cargo.'</td>';
                $html = $html.'<td>'.$historico_experiencia_outra->data_inicio.'</td><td>'.$historico_experiencia_outra->data_fim.'</td></tr>';
            }
            $html = $html.'</table';
            
            $familiares = Familiar::where('funcionario_id',$funcionario_efectivo->funcionario_id)->get();
            
            $html = $html.'<p style="text-align:center;"><i>DADOS FAMILIARES</i></p>';
            $html = $html.'<p style="text-align:center;"><i><u>AGREGADO FAMILIAR</u></i></p>';
            $html = $html.'<table border="1" style="text-align:center;margin: 0 auto;" width="80%" >';
            $html = $html.'<tr bgcolor="#F7D358"><td>NOME</td><td>PARENTESCO</td><td>DATA NASCIMENTO</td><td>CONTACTO</td><td>DOCUMENTO SUPORTE</td></tr>';
            
            foreach ($familiares as $familiar)
            {
                $html = $html.'<tr><td>'.$familiar->nome.'</td><td>'.Parentesco::where('id',$familiar->parentesco)->first()->descricao.'</td>';
                $html = $html.'<td>'.$familiar->data_nascimento.'</td><td>'.$familiar->contacto.'</td>';
                $html = $html.'<td>'.  Tipo_documento::where('id',$familiar->tipo_documento)->first()->descricao.'</td></tr>';
            }
            $html = $html.'</table';
        }
                
        $pdf->loadHTML($html);
        return $pdf->download('funcionario'.$funcionario_existente->codigo.'.pdf');
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
       
       return redirect('/efectivo2?funcionario_id='.$id.'&estado=novo');
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
       
       return redirect('/reformado2?funcionario_id='.$id.'&estado=novo');
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
           'codigo_familiar' => 'required|exists:funcionario_existente,codigo',
       ]);
       
       $user=Auth::user()->funcionariosCreated();
       $estado_civil=Estado_civil::where('id',$request->input('estado_civil'))->first();
       
       $funcionario = new Funcionario;
       $funcionario_pensionista = new Funcionario_pensionista;
       
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
       $estado = $request->estado;   
       $funcionario_id=$request->funcionario_id;
       
       if($estado=='novo')
       {
           $experiencia_edm_reformado = new Experiencia_edm_reformado; 
           $familiares = array(New Familiar, New Familiar, New Familiar, New Familiar, New Familiar);
       }
       else
       {
           $experiencia_edm_reformado = Experiencia_edm_reformado::where('funcionario_id',$funcionario_id)->first();
           $familiares = Familiar::where('funcionario_id',$funcionario_id)->get();
           
           $length = 5 - count($familiares);         
           for ($j = 0; $j < $length; $j++) {
                $familiares[] = New Familiar;
           }
       }
        
       return view('layout.form_reformados2', [
            'funcionario_id' => $request->funcionario_id,
            'direccoes' => Direccao::pluck('descricao', 'id'),
            'tipos_documento' => Tipo_documento::pluck('descricao', 'id'),
            'parentescos' => Parentesco::pluck('descricao', 'id'),
            'experiencia_edm_reformado' => $experiencia_edm_reformado,
            'familiares' => $familiares,
        ]);
    }
    
    public function storeFuncionarioReformado2(Request $request)
    {
        $funcionario_id = $request->funcionario_id;
        $experienciaEDM_reformado = new Experiencia_edm_reformado;
        $experienciaEDM_reformado->funcionario_id=$funcionario_id;
        $experienciaEDM_reformado->data_reforma=$request->data_reforma;
        $experienciaEDM_reformado->direccao=$request->input('direccao');
        
        Experiencia_edm_reformado::where('funcionario_id',$funcionario_id)->delete();
        $experienciaEDM_reformado->save();
        
        Familiar::where('funcionario_id',$funcionario_id)->delete();
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
        $estado = $request->estado;   
        $funcionario_id=$request->funcionario_id;

        if($estado=='novo')
        {
            $experiencia_edm = new Experiencia_edm; 
        }
        else
        {
            $experiencia_edm = Experiencia_edm::where('funcionario_id',$funcionario_id)->first();
            if(count(Experiencia_edm::where('funcionario_id',$funcionario_id)->get())<1)
            {
                $experiencia_edm = new Experiencia_edm;   
            }
        }
        
        return view('layout.form_efectivo2', [
            'funcionario_id' => $request->funcionario_id,
            'situacoes' => Situacao_experiencia::pluck('descricao', 'id'),
            'carreira' => Carreira::pluck('descricao', 'id'),
            'direccao' => Direccao::pluck('descricao', 'id'),
            'departamento' => Departamento::where('direccaos_id',$experiencia_edm->direccao)->pluck('descricao', 'id'),
            'cargo' => Cargo::pluck('descricao', 'id'),
            'profissao' => Profissao::pluck('descricao', 'id'),
            'experiencia_edm' => $experiencia_edm,
            'estado' => $estado,
         ]);
    }
    public function storeFuncionarioEfectivo2(Request $request)
    {
        $funcionario = Funcionario::where('id',$request->funcionario_id)->first();
        $data_minima_integracao = Carbon::parse($funcionario->data_nascimento);
        $data_minima_integracao->addYears(18);
        
        $this->validate($request, [
           'data_admissao' => 'required|date|before:today',
           'data_integracao' =>'required|date|before:today|after:'.$request->data_admissao.'|after:'.$data_minima_integracao,
           'carreira'=>'not_in:1',
           'direccao'=>'not_in:1',
           'situacao'=>'not_in:1',
           'departamento'=>'not_in:1',
           'cargo'=>'not_in:1',
           'profissao'=>'not_in:1',
        ]);
        
        $experiencia_edm = New Experiencia_edm;
        $experiencia_edm->funcionario_id=$request->funcionario_id;
        $experiencia_edm->data_admissao=$request->data_admissao;
        $experiencia_edm->data_integraccao=$request->data_integracao;
        $experiencia_edm->carreira=$request->input('carreira');
        $experiencia_edm->situacao=$request->input('situacao');
        $experiencia_edm->direccao=$request->input('direccao');
        $experiencia_edm->departamento=$request->input('departamento');
        $experiencia_edm->cargo=$request->input('cargo');
        $experiencia_edm->profissao=$request->input('profissao');
        
        Experiencia_edm::where('funcionario_id',$request->funcionario_id)->delete();
        $experiencia_edm->save();
        
        $id=$request->funcionario_id;
        
        return redirect('/efectivo3?funcionario_id='.$funcionario->id.'&estado='.$request->estado);
    }
    
    public function formularioEfectivo3(Request $request)
    {
        $estado = $request->estado;  
        $funcionario_id=$request->funcionario_id;

        if($estado=='novo')
        {
            $qualificacoes = array(New Qualificacao, New Qualificacao, New Qualificacao, New Qualificacao, New Qualificacao);
            $experiencias = array(New Historico_experiencia_edm, New Historico_experiencia_edm, New Historico_experiencia_edm, New Historico_experiencia_edm, New Historico_experiencia_edm);
        }
        else
        {
            $qualificacoes = Qualificacao::where('funcionario_id',$funcionario_id)->get();
            $length = 5 - count($qualificacoes);         
            for ($j = 0; $j < $length; $j++) {
                $qualificacoes[] = New Qualificacao;
            }
            
            $experiencias = Historico_experiencia_edm::where('funcionario_id',$funcionario_id)->get();
            $length = 5 - count($experiencias);         
            for ($j = 0; $j < $length; $j++) {
                $experiencias[] = New Historico_experiencia_edm;
            }     
        }
        
        return view('layout.form_efectivo3', [
            'funcionario_id' => $funcionario_id,
            'instituicao' => Instituicao_ensino::pluck('descricao', 'id'),
            'certificado' => Certificado_ensino::pluck('descricao', 'id'),
            'direccao' => Direccao::pluck('descricao', 'id'),
            'departamento' => Departamento::pluck('descricao', 'id'),
            'cargo' => Cargo::pluck('descricao', 'id'),
            'profissao' => Profissao::pluck('descricao', 'id'),
            'estado' => $estado,
            'qualificacoes' => $qualificacoes,
            'experiencias' => $experiencias,
         ]);
    }
    
    public function storeFuncionarioEfectivo3(Request $request)
    {   
        Qualificacao::where('funcionario_id',$request->funcionario_id)->delete();
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
        
        Historico_experiencia_edm::where('funcionario_id',$request->funcionario_id)->delete();
        if($request->input('salvarExperienciaEDM1')==true)
        {
            $historico_edm = New Historico_experiencia_edm;
            $historico_edm->funcionario_id=$request->funcionario_id;
            $historico_edm->data_inicio=$request->data_inicio1;
            $historico_edm->data_fim=$request->data_fim1;
            $historico_edm->direccao=$request->input('direccao1');
            $historico_edm->departamento=$request->input('departamento1');
            $historico_edm->cargo=$request->input('cargo1');
            $historico_edm->profissao=$request->input('profissao1');
            $historico_edm->save();
        }
        
        if($request->input('salvarExperienciaEDM2')==true)
        {
            $historico_edm = New Historico_experiencia_edm;
            $historico_edm->funcionario_id=$request->funcionario_id;
            $historico_edm->data_inicio=$request->data_inicio2;
            $historico_edm->data_fim=$request->data_fim2;
            $historico_edm->direccao=$request->input('direccao2');
            $historico_edm->departamento=$request->input('departamento2');
            $historico_edm->cargo=$request->input('cargo2');
            $historico_edm->profissao=$request->input('profissao2');
            $historico_edm->save();
        }
        
        if($request->input('salvarExperienciaEDM3')==true)
        {
            $historico_edm = New Historico_experiencia_edm;
            $historico_edm->funcionario_id=$request->funcionario_id;
            $historico_edm->data_inicio=$request->data_inicio3;
            $historico_edm->data_fim=$request->data_fim3;
            $historico_edm->direccao=$request->input('direccao3');
            $historico_edm->departamento=$request->input('departamento3');
            $historico_edm->cargo=$request->input('cargo3');
            $historico_edm->profissao=$request->input('profissao3');
            $historico_edm->save();
        }
        
        if($request->input('salvarExperienciaEDM4')==true)
        {
            $historico_edm = New Historico_experiencia_edm;
            $historico_edm->funcionario_id=$request->funcionario_id;
            $historico_edm->data_inicio=$request->data_inicio4;
            $historico_edm->data_fim=$request->data_fim4;
            $historico_edm->direccao=$request->input('direccao4');
            $historico_edm->departamento=$request->input('departamento4');
            $historico_edm->cargo=$request->input('cargo4');
            $historico_edm->profissao=$request->input('profissao4');
            $historico_edm->save();
        }
        
        if($request->input('salvarExperienciaEDM5')==true)
        {
            $historico_edm = New Historico_experiencia_edm;
            $historico_edm->funcionario_id=$request->funcionario_id;
            $historico_edm->data_inicio=$request->data_inicio5;
            $historico_edm->data_fim=$request->data_fim5;
            $historico_edm->direccao=$request->input('direccao5');
            $historico_edm->departamento=$request->input('departamento5');
            $historico_edm->cargo=$request->input('cargo5');
            $historico_edm->profissao=$request->input('profissao5');
            $historico_edm->save();
        }
        $id=$request->funcionario_id;
        
        return redirect('/efectivo4?funcionario_id='.$id.'&estado='.$request->estado);
    }
    
    public function formularioEfectivo4(Request $request)
    {
        $estado = $request->estado;  
        $funcionario_id=$request->funcionario_id;

        if($estado=='novo')
        {
            $familiares = array(New Familiar, New Familiar, New Familiar, New Familiar, New Familiar);
            $experiencias = array(New Historico_experiencia_outra, New Historico_experiencia_outra, 
                New Historico_experiencia_outra, New Historico_experiencia_outra, New Historico_experiencia_outra);
        }
        else
        {
            $familiares = Familiar::where('funcionario_id',$funcionario_id)->get();   
            $length = 5 - count($familiares);         
            for ($j = 0; $j < $length; $j++) {
                $familiares[] = New Familiar;
            }
            
            $experiencias = Historico_experiencia_outra::where('funcionario_id',$funcionario_id)->get();
            $length = 5 - count($experiencias);         
            for ($j = 0; $j < $length; $j++) {
                $experiencias[] = New Historico_experiencia_outra;
            }
            
        }
        
        return view('layout.form_efectivo4', [
           'funcionario_id' => $request->funcionario_id,
           'instituicao' => Instituicao_ensino::pluck('descricao', 'id'),
           'cargo' => Cargo::pluck('descricao', 'id'),
           'profissao' => Profissao::pluck('descricao', 'id'),
           'tipos_documento' => Tipo_documento::pluck('descricao', 'id'),
           'parentescos' => Parentesco::pluck('descricao', 'id'),
           'estado' => $estado,
           'familiares' => $familiares,
           'experiencias' => $experiencias,
        ]);
    }
    
    public function storeFuncionarioEfectivo4(Request $request)
    {   
        Familiar::where('funcionario_id',$request->funcionario_id)->delete();
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
        
        Historico_experiencia_outra::where('funcionario_id',$request->funcionario_id)->delete();
        if($request->input('salvarExperienciaOutra1')==true)
        {
            $experiencia_outra = New Historico_experiencia_outra;
            $experiencia_outra->funcionario_id=$request->funcionario_id;
            $experiencia_outra->data_inicio=$request->data_inicio1;
            $experiencia_outra->data_fim=$request->data_fim1;
            $experiencia_outra->instituicao=$request->instituicao1;
            $experiencia_outra->cargo=$request->cargo1;
            $experiencia_outra->profissao=$request->profissao1;
            $experiencia_outra->save();
        }
        if($request->input('salvarExperienciaOutra2')==true)
        {
            $experiencia_outra = New Historico_experiencia_outra;
            $experiencia_outra->funcionario_id=$request->funcionario_id;
            $experiencia_outra->data_inicio=$request->data_inicio2;
            $experiencia_outra->data_fim=$request->data_fim2;
            $experiencia_outra->instituicao=$request->instituicao2;
            $experiencia_outra->cargo=$request->cargo2;
            $experiencia_outra->profissao=$request->profissao2;
            $experiencia_outra->save();
        }
        if($request->input('salvarExperienciaOutra3')==true)
        {
            $experiencia_outra = New Historico_experiencia_outra;
            $experiencia_outra->funcionario_id=$request->funcionario_id;
            $experiencia_outra->data_inicio=$request->data_inicio3;
            $experiencia_outra->data_fim=$request->data_fim3;
            $experiencia_outra->instituicao=$request->instituicao3;
            $experiencia_outra->cargo=$request->cargo3;
            $experiencia_outra->profissao=$request->profissao3;
            $experiencia_outra->save();
        }
        if($request->input('salvarExperienciaOutra4')==true)
        {
            $experiencia_outra = New Historico_experiencia_outra;
            $experiencia_outra->funcionario_id=$request->funcionario_id;
            $experiencia_outra->data_inicio=$request->data_inicio4;
            $experiencia_outra->data_fim=$request->data_fim4;
            $experiencia_outra->instituicao=$request->instituicao4;
            $experiencia_outra->cargo=$request->cargo4;
            $experiencia_outra->profissao=$request->profissao4;
            $experiencia_outra->save();
        }
        if($request->input('salvarExperienciaOutra5')==true)
        {
            $experiencia_outra = New Historico_experiencia_outra;
            $experiencia_outra->funcionario_id=$request->funcionario_id;
            $experiencia_outra->data_inicio=$request->data_inicio5;
            $experiencia_outra->data_fim=$request->data_fim5;
            $experiencia_outra->instituicao=$request->instituicao5;
            $experiencia_outra->cargo=$request->cargo5;
            $experiencia_outra->profissao=$request->profissao5;
            $experiencia_outra->save();
        }
        
        return view('layout.form_saved', [
            'funcionario_id' => $request->funcionario_id,
            'tipo' => 'efectivo',
        ]);
    }
    
    public function buscaFuncionarios(Request $request)
    {
        return view('layout.form_busca_colaboradores', [
            'funcionarios' => array(),
        ]);
    }
    
    public function listaFuncionarios(Request $request)
    {
        $nome = $request -> nome;
        $codigo = $request -> codigo;
        $user = Auth::user();
        
        if($nome=="")
        {
            $this->validate($request, [
                'codigo' => 'required|exists:funcionario_existente,codigo|size:6',
            ]);
            
            if($user->tipo_utilizador==3)
            {
                $funcionarios = Funcionario::where('codigo', $codigo)
                        ->where('user_created',$user->id)
                        ->get();
            }
            else
            {
                $funcionarios = Funcionario::where('codigo', $codigo)->get();
            }        
        }
        else
        {
            if($user->tipo_utilizador==3)
            {
                $funcionarios = Funcionario::where('nome_completo', 'like', '%' . $nome . '%')
                        ->where('user_created',$user->id)
                        ->get();
            }
            else
            {
                $funcionarios = Funcionario::where('nome_completo', 'like', '%' . $nome . '%')->get();
            }     
        }
           
        return view('layout.form_busca_colaboradores', [
            'funcionarios' => $funcionarios,
        ]);
    }
    
    public function alterarFuncionario(Request $request, Funcionario $funcionario)
    {
        if(count(Funcionario_pensionista::where('funcionario_id',$funcionario->id)->get())>=1)
        {
            $funcionario_pensionista = Funcionario_pensionista::where('funcionario_id',$funcionario->id)->first();
            return view('layout.form_pensionistas', [
                'bancos' => Banco::pluck('descricao', 'id'),
                'estados_civil' => Estado_civil::pluck('descricao', 'id'),
                'generos' => Genero::pluck('descricao', 'id'),
                'provincias' => Provincia::pluck('descricao', 'id'),
                'distritos_morada' => Distrito::where('provincias_id',$funcionario->provincia_morada)->pluck('descricao', 'id'),
                'distritos_naturalidade' => Distrito::where('provincias_id',$funcionario->provincia_naturalidade)->pluck('descricao', 'id'),
                'tipos_documento' => Tipo_documento::pluck('descricao', 'id'),
                'tipos_carta' => Tipo_carta_conducao::pluck('descricao', 'id'),
                'paises' => Pais::pluck('descricao', 'id'),
                'tamanhos_letra' => Tamanho_letra::pluck('descricao', 'id'),
                'tamanhos_numero' => Tamanho_numero::pluck('descricao', 'id'),
                'tipos_sanguineo' => Tipo_sanguineo::pluck('descricao', 'id'),
                'parentescos' => Parentesco::pluck('descricao', 'id'),
                'tipo' => 'pensionista',
                'funcionario' => $funcionario,
                'funcionario_pensionista' => $funcionario_pensionista,
                'tipo_funcionario' =>'Pensionista',
            ]);
        }
        if(count(Funcionario_reformado::where('funcionario_id',$funcionario->id)->get())>=1)
        {       
            $funcionario_reformado = Funcionario_reformado::where('funcionario_id',$funcionario->id)->first();
            return view('layout.form_reformados', [
                'bancos' => Banco::pluck('descricao', 'id'),
                'estados_civil' => Estado_civil::pluck('descricao', 'id'),
                'generos' => Genero::pluck('descricao', 'id'),
                'provincias' => Provincia::pluck('descricao', 'id'),
                'distritos_morada' => Distrito::where('provincias_id',$funcionario->provincia_morada)->pluck('descricao', 'id'),
                'distritos_naturalidade' => Distrito::where('provincias_id',$funcionario->provincia_naturalidade)->pluck('descricao', 'id'),
                'tipos_documento' => Tipo_documento::pluck('descricao', 'id'),
                'tipos_carta' => Tipo_carta_conducao::pluck('descricao', 'id'),
                'paises' => Pais::pluck('descricao', 'id'),
                'tamanhos_letra' => Tamanho_letra::pluck('descricao', 'id'),
                'tamanhos_numero' => Tamanho_numero::pluck('descricao', 'id'),
                'tipos_sanguineo' => Tipo_sanguineo::pluck('descricao', 'id'),
                'tipo' => 'reformado',
                'funcionario' => $funcionario,
                'funcionario_reformado' => $funcionario_reformado,
                'tipo_funcionario' =>'Reformado',
            ]);
        }
        if(count(Funcionario_efectivo::where('funcionario_id',$funcionario->id)->get())>=1)
        {          
            $funcionario_efectivo = Funcionario_efectivo::where('funcionario_id',$funcionario->id)->first();
            return view('layout.form_efectivo', [
                'bancos' => Banco::pluck('descricao', 'id'),
                'estados_civil' => Estado_civil::pluck('descricao', 'id'),
                'generos' => Genero::pluck('descricao', 'id'),
                'provincias' => Provincia::pluck('descricao', 'id'),
                'distritos_morada' => Distrito::where('provincias_id',$funcionario->provincia_morada)->pluck('descricao', 'id'),
                'distritos_naturalidade' => Distrito::where('provincias_id',$funcionario->provincia_naturalidade)->pluck('descricao', 'id'),
                'tipos_documento' => Tipo_documento::pluck('descricao', 'id'),
                'tipos_carta' => Tipo_carta_conducao::pluck('descricao', 'id'),
                'paises' => Pais::pluck('descricao', 'id'),
                'tamanhos_letra' => Tamanho_letra::pluck('descricao', 'id'),
                'tamanhos_numero' => Tamanho_numero::pluck('descricao', 'id'),
                'tipos_sanguineo' => Tipo_sanguineo::pluck('descricao', 'id'),
                'tipo' => 'reformado',
                'funcionario' => $funcionario,
                'funcionario_efectivo' => $funcionario_efectivo,
                'tipo_funcionario' =>'Efectivo',
            ]);
        }
    }
    
    public function salvarAlteracaoFuncionario(Request $request, Funcionario $funcionario)
    {
        if(count(Funcionario_pensionista::where('funcionario_id',$funcionario->id)->get())>=1)
        {
            $this->validate($request, [
               'codigo' => 'required|exists:funcionario_existente,codigo',
               'nome_completo' =>'required|max:75',
               'numero_documento' =>'required|max:20',
               'nuit' =>'required|digits:9',
               'numero_conta_mzn' =>'required|digits_between:7,21',
               'celular' =>'required|digits_between:8,13',
               'morada' =>'required',
               'codigo_familiar' => 'required|exists:funcionario_existente,codigo',
           ]);
        }
        if(count(Funcionario_reformado::where('funcionario_id',$funcionario->id)->get())>=1)
        {
            $this->validate($request, [
                'codigo' => 'required|exists:funcionario_existente,codigo',
                'nome_completo' =>'required|max:75',
                'numero_documento' =>'required|max:20',
                'nuit' =>'required|digits:9',
                'numero_conta_mzn' =>'required|digits_between:7,21',
                'celular' =>'required|digits_between:8,13',
                'morada' =>'required',
                'email' =>'required|email',
                'pensao_reforma_mzn' =>'required',
            ]);
        }
        if(count(Funcionario_efectivo::where('funcionario_id',$funcionario->id)->get())>=1)
        {
            $this->validate($request, [
                'codigo' => 'required|exists:funcionario_existente,codigo',
                'nome_completo' =>'required|max:75',
                'numero_documento' =>'required|max:20',
                'nuit' =>'required|digits:9',
                'numero_conta_mzn' =>'required|digits_between:7,21',
                'celular' =>'required|digits_between:8,13',
                'morada' =>'required',
                'email' =>'required|email',
                'numero_inss' =>'digits:9',
            ]);
        }
            
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

        $funcionario->save();

        $id=Funcionario::where('codigo',$request->codigo)->first()->id;
       
        if(count(Funcionario_pensionista::where('funcionario_id',$funcionario->id)->get())>=1)
        {
            $funcionario_pensionista = Funcionario_pensionista::where('funcionario_id',$funcionario->id)->first();

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
        if(count(Funcionario_reformado::where('funcionario_id',$funcionario->id)->get())>=1)
        {
            $funcionario_reformado=Funcionario_reformado::where('funcionario_id',$funcionario->id)->first();
            $funcionario_reformado->pensao_reforma_mzn=$request->pensao_reforma_mzn;
            $funcionario_reformado->pensao_reforma_usd=$request->pensao_reforma_usd;

            $funcionario_reformado->save();
            
            return redirect('/reformado2?funcionario_id='.$funcionario->id.'&estado=existente');
        }
        if(count(Funcionario_efectivo::where('funcionario_id',$funcionario->id)->get())>=1)
        {
            $funcionario_efectivo=Funcionario_efectivo::where('funcionario_id',$funcionario->id)->first();
            $funcionario_efectivo->numero_inss=$request->numero_inss;
            $funcionario_efectivo->numero_carta_conducao=$request->numero_carta_conducao;
            $funcionario_efectivo->tipo_carta_conducao=$request->input('tipo_carta_conducao');
            $funcionario_efectivo->tamanho_camisete=$request->input('tamanho_camisete');
            $funcionario_efectivo->tamanho_botas=$request->input('tamanho_botas');
            $funcionario_efectivo->tamanho_fato=$request->input('tamanho_fato');
            $funcionario_efectivo->tamanho_capacete=$request->input('tamanho_capacete');
            $funcionario_efectivo->tipo_sanguineo=$request->input('tipo_sanguineo');

            $funcionario_efectivo->save();
            
            return redirect('/efectivo2?funcionario_id='.$funcionario->id.'&estado=existente');
        }
    }
    
    public function getDepartamentos(Request $request, $direccao)
    {
        $departamentos = Departamento::where('direccaos_id',$direccao)->get();
        return $departamentos;
    }
    
    public function getDistritos(Request $request, $provincia)
    {
        $distritos = Distrito::where('provincias_id',$provincia)->get();
        return $distritos;
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
