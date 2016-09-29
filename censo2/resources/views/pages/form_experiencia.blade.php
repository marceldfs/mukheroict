<div class="panel panel-default">
    <div class="panel-heading panel-orange-heading">
        <span class="panel-heading-text">Experiencia Profissional (EDM)</span>
    </div>
    <div class="panel-body">
        <div class="form-group {{ $errors->has('data_admissao') ? ' has-error' : '' }}">
            {!! Form::label('ldata_admissao','Data de admissao:', ['class' => 'label-required','for' => 'data_admissao' ]) !!}	
            {!! Form::date('data_admissao', \Carbon\Carbon::now()) !!}
            @if ($errors->has('data_admissao'))
            <span class="help-block">
                <strong>{{ $errors->first('data_admissao') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('data_integracao') ? ' has-error' : '' }}">
            {!! Form::label('ldata_integracao','Data de integracao:', ['class' => 'label-required','for' => 'data_integracao' ]) !!}	
            {!! Form::date('data_integracao', \Carbon\Carbon::now()) !!}
            @if ($errors->has('data_integracao'))
            <span class="help-block">
                <strong>{{ $errors->first('data_integracao') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('situacao') ? ' has-error' : '' }}">									
            {!! Form::label('lsituacao','Situacao:', ['class' => 'label-required','for' => 'situacao' ]) !!}								    
            {!! Form::select('situacao', $situacao, null, ['class' => 'form-control ', 'id' => 'situacao']) !!}
            @if ($errors->has('situacao'))
            <span class="help-block">
                <strong>{{ $errors->first('situacao') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('carreira') ? ' has-error' : '' }}">
            {!! Form::label('lcarreira','Carreira:', ['for' => 'carreira' ]) !!}								    
            {!! Form::select('carreira', $carreira, null, ['class' => 'form-control ', 'id' => 'carreira']) !!}
            @if ($errors->has('carreira'))
            <span class="help-block">
                <strong>{{ $errors->first('carreira') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('cargo') ? ' has-error' : '' }}">
            {!! Form::label('lcargo','Cargo:', ['for' => 'cargo' ]) !!}								    
            {!! Form::select('cargo', $cargo, null, ['class' => 'form-control ', 'id' => 'cargo']) !!}	
            @if ($errors->has('cargo'))
            <span class="help-block">
                <strong>{{ $errors->first('cargo') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('profissao') ? ' has-error' : '' }}">
            {!! Form::label('lprofissao','Profissao:', ['for' => 'profissao' ]) !!}								    
            {!! Form::select('profissao', $profissao, null, ['class' => 'form-control ', 'id' => 'profissao']) !!}
            @if ($errors->has('profissao'))
            <span class="help-block">
                <strong>{{ $errors->first('profissao') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('direccao') ? ' has-error' : '' }}">
            {!! Form::label('ldireccao','Direccao(actual):', ['for' => 'direccao' ]) !!}								    
            {!! Form::select('direccao', $direccao, null, ['class' => 'form-control ', 'id' => 'direccao']) !!}	
            @if ($errors->has('direccao'))
            <span class="help-block">
                <strong>{{ $errors->first('direccao') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('departamento') ? ' has-error' : '' }}">
            {!! Form::label('ldepartamento','Departamento(actual):', ['for' => 'departamento' ]) !!}								    
            {!! Form::select('departamento', $departamento, null, ['class' => 'form-control ', 'id' => 'departamento']) !!}
            @if ($errors->has('departamento'))
            <span class="help-block">
                <strong>{{ $errors->first('departamento') }}</strong>
            </span>
            @endif
        </div>
        <script>         
            $('#direccao').on('change', function(e){
                console.log(e);
                var direccao_id = e.target.value;
                
                $.get('/departamentos/' + direccao_id, function(data) {
                    console.log(data);
                    $('#departamento').empty();
                    $.each(data, function(index,subCatObj){
                        $('#departamento').append('<option value="' + subCatObj.id +'">' + subCatObj.descricao + '</option>');
                        console.log(subCatObj);
                    });
                });
            });
        </script>
    </div>
</div>  