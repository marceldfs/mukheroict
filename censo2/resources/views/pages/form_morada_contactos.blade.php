<div class="panel panel-default">
    <div class="panel-heading">
        Morada/Contactos
    </div>
        
    <div class="panel-body">
        
        <div class="form-horizontal">
            <!--PROVINCIA E DISTRITO-->
            <div class="form-group col-lg-6">
                {!! Form::label('lprov','Provincia:', [ 'class' => 'label-required','for' => 'provincia_morada' ]) !!}	
                {!! Form::select('provincia_morada', $provincias, $funcionario->provincia_morada, ['class' => 'form-control ', 'id' => 'provincia_morada']) !!}
            </div>	
            <div class="form-group col-lg-6 pull-right">
                {!! Form::label('ldistr','Distrito:', ['for' => 'distrito_morada'])  !!}
                {!! Form::select('distrito_morada', $distritos, $funcionario->distrito_morada, ['class' => 'form-control ', 'id' => 'distrito_morada']) !!}
            </div>
        </div>
            
        <!--Pais E lcaoliadade-->
        <div class="form-horizontal">
            <div class="form-group col-lg-6">
                {!! Form::label('lpais','Pais:', [ 'for' => 'pais_morada' ]) !!}	
                {!! Form::select('pais_morada', $paises, $funcionario->pais_morada, ['class' => 'form-control ', 'id' => 'pais_morada']) !!}
            </div>	
            <div class="form-group col-lg-6 pull-right">
                {!! Form::label('llocalidade','Localidade:', ['for' => 'localidade'])  !!}
                {!! Form::text('localidade',$funcionario->localidade,['class' => 'form-control ', 'id' => 'localidade', 'placeholder' => '', 'readonly' => 'true']) !!}
            </div>
        </div>
        <div class="form-horizontal">
            <!--Celulares-->
            <div class="form-group col-lg-6 {{ $errors->has('celular') ? ' has-error' : '' }}">
                {!! Form::label('lcel','Numero de Celular:', ['class' => 'label-required','for' => 'celular'])  !!}
                {!! Form::text('celular',$funcionario->celular,['class' => 'form-control ', 'id' => 'celular', 'type' => 'number','placeholder' => 'n&atilde;o use letras', 'readonly' => 'true']) !!}
                @if ($errors->has('celular'))
                <span class="help-block">
                    <strong>{{ $errors->first('celular') }}</strong>
                </span>
                @endif
            </div>	
            <div class="form-group col-lg-6 pull-right">
                {!! Form::label('ltel','Numero de Celular alternativo:', ['for' => 'celular_alternativo'])  !!}
                {!! Form::text('celular_alternativo',$funcionario->celular_alternativo,['class' => 'form-control ', 'id' => 'celular_alternativo', 'type' => 'number',
                'placeholder' => 'n&atilde;o use letras', 'readonly' => 'true']) !!}
            </div>	
            <div class="form-group col-lg-12 {{ $errors->has('morada') ? ' has-error' : '' }}"> 
                {!! Form::label('lmorada','Morada:', ['class' => 'label-required','for' => 'morada'])  !!}
                {!! Form::text('morada',$funcionario->morada,['class' => 'form-control ', 'id' => 'morada', 'readonly' => 'true']) !!}
                @if ($errors->has('morada'))
                <span class="help-block">
                    <strong>{{ $errors->first('morada') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group col-lg-12 {{ $errors->has('email') ? ' has-error' : '' }}"> 									
                {!! Form::label('lemail','Email:', ['class' => 'label-required','for' => 'email'])  !!}
                {!! Form::text('email',$funcionario->email,['class' => 'form-control ', 'id' => 'email', 'type'=>'email','placeholder' => 'email@edm.co.mz', 'readonly' => 'true']) !!}
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>											
        </div>													
    </div>
</div>