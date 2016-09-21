@extends('layout.app')
@section('content')
<div class="container mukheroHack">
    <div class="panel panel-default ">
        <div class="panel-heading panel-orange-heading">
            <h3 class="panel-heading-text text-center"> Busca de Colaboradores</h3>
        </div>
        <div class="panel-body">
            {{Form::open()}}
            <div class="form-horizontal">
                <div class="col-lg-3">                   
                    {!! Form::label('lnome','Nome:', ['class' => 'label-required','for' => 'nome'])  !!}
                    {!! Form::text('nome',null,['class' => 'form-control ', 'id' => 'nome']) !!}
                    {!! Form::label('lcodigo','Codigo:', ['class' => 'label-required','for' => 'codigo'])  !!}
                    {!! Form::text('codigo',null,['class' => 'form-control ', 'id' => 'codigo']) !!}
                    @if ($errors->has('codigo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('codigo') }}</strong>
                    </span>
                    @endif
                </div>   
            </div>
            <div class="row">
                <div class="col-lg-12 ">
                    {!!Form::submit('Procurar',['class' => 'btn btn-warning pull-right']); !!}
                </div>
            </div>
            {{Form::close()}}
            
            @if (count($funcionarios) > 0)		
            <div class="panel panel-default">		
                <div class="panel-heading">		
                    Funcionarios		
                </div>		
                
                <div class="panel-body">		
                    <table class="table table-striped task-table">		
                        
                        <!-- Table Headings -->		
                        <thead>		
                        <th>Id</th>		
                        <th>Nome</th>		
                        <th>&nbsp</th>		
                        </thead>		
                        
                        <!-- Table Body -->		
                        <tbody>		
                            @foreach ($funcionarios as $funcionario)		
                            <tr>		
                                <!-- Task Name -->		
                                <td class="table-text">		
                                    <div>{{ $funcionario->codigo }}</div>		
                                </td>		
                                
                                <td class="table-text">		
                                    <div>{{ $funcionario->nome_completo }}</div>		
                                </td>		
                                
                                <!--<td>		
                                    <form action="{{ url('alterarFuncionario/'.$funcionario->id) }}" method="POST">		
                                        {{ csrf_field() }}		
                                        {{ method_field('GET') }}		
                                        
                                        <button type="submit" class="btn btn-danger">		
                                            <i class="fa fa-trash"></i> Alterar Funcionario		
                                        </button>		
                                    </form>		
                                </td>	-->	
                            </tr>		
                            @endforeach		
                        </tbody>		
                    </table>		
                </div>		
            </div>		
            @endif
            
        </div> 	
    </div>	
</div>
@stop


