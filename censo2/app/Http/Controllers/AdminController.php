<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Funcionario_efectivo;
use App\Funcionario_reformado;
use App\Funcionario;
use App\Experiencia_edm;
use App\Experiencia_edm_reformado;
use App\Situacao_experiencia;
use App\Direccao;
use App\Departamento;
use App\Carreira;
use App\Profissao;
use App\Cargo;

class AdminController extends Controller
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
    
    public function efectivos(){
        \Excel::create('Efectivos', function($excel) {
            $excel->sheet('Sheetname', function($sheet) {

                $funcionariosEfectivos = Funcionario_efectivo::all();
                $i=2;
                $sheet->row(1, array(
                    'Nome',
                    'Situacao',
                    '',
                    'Data_admissao',
                    'Data_integraccao',
                    'Direccao',
                    '',
                    'Departamento',
                    '',
                    'Carreira',
                    '',
                    'Profissao',
                    '',
                    'Cargo',
                    '',
                ));
                foreach ($funcionariosEfectivos as $funcionarioEfectivo)
                {
                    $funcionario= Funcionario::where('id',$funcionarioEfectivo->funcionario_id)->first() == null ? new Funcionario : 
                            Funcionario::where('id',$funcionarioEfectivo->funcionario_id)->first();
                    $experiencia_edm= Experiencia_edm::where('funcionario_id',$funcionarioEfectivo->funcionario_id)->first() == null ? 
                            new Experiencia_edm : Experiencia_edm::where('funcionario_id',$funcionarioEfectivo->funcionario_id)->first();
                    $situacao_experiencia= Situacao_experiencia::where('id',$experiencia_edm->situacao)->first() == null ? 
                            new Situacao_experiencia : Situacao_experiencia::where('id',$experiencia_edm->situacao)->first();
                    $direccao= Direccao::where('id',$experiencia_edm->direccao)->first() == null ? 
                            new Direccao : Direccao::where('id',$experiencia_edm->direccao)->first();
                    $departamento= Departamento::where('id',$experiencia_edm->departamento)->first() == null ? 
                            new Departamento : Departamento::where('id',$experiencia_edm->departamento)->first();
                    $carreira= Carreira::where('id',$experiencia_edm->carreira)->first() == null ? 
                            new Carreira : Carreira::where('id',$experiencia_edm->carreira)->first();
                    $profissao= Profissao::where('id',$experiencia_edm->profissao)->first() == null ? 
                            new Profissao : Profissao::where('id',$experiencia_edm->profissao)->first();
                    $cargo= Cargo::where('id',$experiencia_edm->cargo)->first() == null ? 
                            new Cargo : Cargo::where('id',$experiencia_edm->cargo)->first();
                    $sheet->row($i, array(
                        $funcionario->nome_completo,
                        $situacao_experiencia->codigo,
                        $situacao_experiencia->descricao,
                        $experiencia_edm->data_admissao,
                        $experiencia_edm->data_integraccao,
                        $direccao->codigo,
                        $direccao->descricao,
                        $departamento->codigo,
                        $departamento->descricao,
                        $carreira->codigo,
                        $carreira->descricao,
                        $profissao->codigo,
                        $profissao->descricao,
                        $cargo->codigo,
                        $cargo->descricao,
                    ));
                    $i++;
                }

            });
        })->export('xls');
    }
    
    public function pensionistas(){
    
    }
    
    public function reformados(){
        \Excel::create('Reformados', function($excel) {
            $excel->sheet('Sheetname', function($sheet) {

                $funcionariosReformados = Funcionario_reformado::all();
                $i=2;
                $sheet->row(1, array(
                    'Num. Trabalhador',
                    'Nome',
                    'Data_reforma',
                    'Direccao',
                    '',
                ));
                foreach ($funcionariosReformados as $funcionarioReformado)
                {
                    $funcionario= Funcionario::where('id',$funcionarioReformado->funcionario_id)->first() == null ? new Funcionario : 
                            Funcionario::where('id',$funcionarioReformado->funcionario_id)->first();
                    $experiencia_edm= Experiencia_edm_reformado::where('funcionario_id',$funcionarioReformado->funcionario_id)->first() == null ? 
                            new Experiencia_edm_reformado : Experiencia_edm_reformado::where('funcionario_id',$funcionarioReformado->funcionario_id)->first();
                    $direccao= Direccao::where('id',$experiencia_edm->direccao)->first() == null ? 
                            new Direccao : Direccao::where('id',$experiencia_edm->direccao)->first();
                    $sheet->row($i, array(
                        $funcionario->codigo,
                        $funcionario->nome_completo,
                        $experiencia_edm->data_reforma,
                        $direccao->codigo,
                        $direccao->descricao,
                    ));
                    $i++;
                }

            });
        })->export('xls');
    }
}
