<div class="panel panel-default">
    <div class="panel-heading">
        Informa&ccedil;&otilde;es Basicas
    </div>
    <div class="panel-body">
        <div class="form-group">
            {!! Form::label('lname1','Nome Completo:', ['class' => 'label-required','for' => 'nome_completo' ]) !!}			    		
            {!! Form::text('nome_completo',null,['class' => 'form-control', 'id' => 'nome_completo']) !!}	
        </div>
        <div class="form-horizontal">
            <div class="form-group col-lg-6">	
                {!! Form::label('lstatus','Estado Civil:', ['class' => 'label-required','for' => 'estado_civil' ]) !!}
                {!! Form::select('estado_civil', $estados_civil, null, ['class' => 'form-control  ', 'id' => 'estado_civil']) !!}			    		
            </div>
            <div class="form-group col-lg-6 pull-right">
                {!! Form::label('lgenero','Genero:', ['class' => 'label-required','for' => 'genero' ]) !!}								    
                {!! Form::select('genero', $generos, null, ['class' => 'form-control ', 'id' => 'genero']) !!}			    										
            </div>	
        </div>
    </div>
</div>