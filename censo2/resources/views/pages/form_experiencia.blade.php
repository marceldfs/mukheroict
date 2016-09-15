<div class="panel panel-default">
    <div class="panel-heading panel-orange-heading">
        <span class="panel-heading-text">Experiencia Profissional (EDM)</span>
    </div>
    <div class="panel-body">
        <div class="form-group">
            {!! Form::label('ldata_admissao','Data de admissao:', ['class' => 'label-required','for' => 'data_admissao' ]) !!}	
            {!! Form::date('data_admissao', \Carbon\Carbon::now()) !!}
        </div>
        <div class="form-group">
            {!! Form::label('ldata_integracao','Data de integracao:', ['class' => 'label-required','for' => 'data_integracao' ]) !!}	
            {!! Form::date('data_integracao', \Carbon\Carbon::now()) !!}
        </div>
        <div class="form-group">									
            {!! Form::label('lsituacao','Situacao:', ['class' => 'label-required','for' => 'situacao' ]) !!}								    
            {!! Form::select('situacao', $situacao, null, ['class' => 'form-control ', 'id' => 'situacao']) !!}			    										
        </div>
        <div class="form-group">
            {!! Form::label('lcarreira','Carreira:', ['for' => 'carreira' ]) !!}								    
            {!! Form::select('carreira', $carreira, null, ['class' => 'form-control ', 'id' => 'carreira']) !!}			    										
        </div>
        <div class="form-group">
            {!! Form::label('lcargo','Cargo:', ['for' => 'cargo' ]) !!}								    
            {!! Form::select('cargo', $cargo, null, ['class' => 'form-control ', 'id' => 'cargo']) !!}			    										
        </div>
        <div class="form-group">
            {!! Form::label('lprofissao','Profissao:', ['for' => 'profissao' ]) !!}								    
            {!! Form::select('profissao', $profissao, null, ['class' => 'form-control ', 'id' => 'profissao']) !!}			    										
        </div>
        <div class="form-group">
            {!! Form::label('ldireccao','Direccao(actual):', ['for' => 'direccao' ]) !!}								    
            {!! Form::select('direccao', $direccao, null, ['class' => 'form-control ', 'id' => 'direccao']) !!}			    										
        </div>
        <div class="form-group">
            {!! Form::label('ldepartamento','Departamento(actual):', ['for' => 'departamento' ]) !!}								    
            {!! Form::select('departamento', $departamento, null, ['class' => 'form-control ', 'id' => 'departamento']) !!}			    										
        </div>
    </div>
</div>  