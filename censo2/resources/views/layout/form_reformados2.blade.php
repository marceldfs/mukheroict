@extends('layout.app')
@section('content')
<div class="container mukheroHack">
    <div class="panel panel-default ">
        <div class="panel-heading panel-orange-heading">
            <h3 class="panel-heading-text text-center"> Ficha de Registro de Reformados </h3>
        </div>
        <div class="panel-body">
            {{Form::open()}}
            <input type="hidden" id="funcionario_id" name="funcionario_id"  value="{{$funcionario_id}}"/>
            <div class="row">
                <div class="col-lg-12">                   
                    @include('pages.form_experienciaEDM_reformado')
                </div>   
            </div>
            <div class="row">
                <div class="col-lg-12">                   
                    @include('pages.form_familiares')
                </div>   
            </div>
            <div class="row">
                <div class="col-lg-12 ">
                    {!!Form::submit('Seguinte',['class' => 'btn btn-warning pull-right']); !!}
                </div>
            </div>
            {{Form::close()}}
        </div> 	
    </div>	
</div>
@stop


