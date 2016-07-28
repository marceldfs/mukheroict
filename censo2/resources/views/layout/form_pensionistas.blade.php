@extends('layout.app')
@section('content')
<div class="container mukheroHack">
    <div class="panel panel-default ">
        <div class="panel-heading panel-orange-heading">
            <h3 class="panel-heading-text text-center"> Ficha de Registro de Pensionistas </h3>
        </div>
        <div class="panel-body">
            {{Form::open()}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-4">                      
                        @include('pages.form_dado_empresarial')
                    </div>
                    <div class="col-lg-8">  
                        @include('pages.form_info_basica')
                    </div>
                </div>   
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-4"> 
                        @include('pages.form_naturalidade')
                    </div>
                    <div class="col-lg-8"> 
                        @include('pages.form_dados_fiscais_R_P')
                    </div>
                </div>	
            </div> 	
            <!--FMAILIARES-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12"> 
                        @include('pages.form_dados_familiares')
                    </div>
                </div>	
            </div> 
            <!--Contas bancarias e outras infos-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-4"> 
                        @include('pages.form_contas_bancarias_R_P')
                    </div>
                    <div class="col-lg-8"> 
                        @include('pages.form_morada_contactos')	
                    </div>  
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


