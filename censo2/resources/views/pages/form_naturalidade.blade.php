<div class="panel panel-default">
    <div class="panel-heading panel-orange-heading">
        <span class="panel-heading-text">Naturalidade</span>
    </div>
    <div class="panel-body">
        <div class="form-group">
            {!! Form::label('ldatanasc','Data de Nascimento:', ['class' => 'label-required','for' => 'data_nascimento' ]) !!}	
            {!! Form::date('data_nascimento', $funcionario->data_nascimento) !!}
        </div>
        <div class="form-group">									
            {!! Form::label('lprov','Provincia:', ['class' => 'label-required','for' => 'provincia' ]) !!}								    
            {!! Form::select('provincia_naturalidade', $provincias, $funcionario->provincia_naturalidade, ['class' => 'form-control ', 'id' => 'provincia_naturalidade']) !!}			    										
        </div>
        <div class="form-group">
            {!! Form::label('ldistrito','Distrito:', ['for' => 'distrito' ]) !!}								    
            {!! Form::select('distrito_naturalidade', $distritos, $funcionario->distrito_naturalidade, ['class' => 'form-control ', 'id' => 'distrito_naturalidade']) !!}			    										
        </div>
        <script>
            $('#provincia_naturalidade').on('change', function(e){
                console.log(e);
                var provincia_id = e.target.value;
                
                $.get('/distritos/' + provincia_id, function(data) {
                    console.log(data);
                    $('#distrito_naturalidade').empty();
                    $.each(data, function(index,subCatObj){
                        $('#distrito_naturalidade').append('<option value="' + subCatObj.id +'">' + subCatObj.descricao + '</option>');
                        console.log(subCatObj);
                    });
                });
            });
        </script>
    </div>	
</div>  