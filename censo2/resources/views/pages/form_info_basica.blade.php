<div class="panel panel-default">
    <div class="panel-heading">
        Informa&ccedil;&otilde;es Basicas
    </div>
    <div class="panel-body">
        <div class="form-group">
            {!! Form::label('lname1','Nome Completo:', ['class' => 'label-required','for' => 'name1' ]) !!}			    		
            {!! Form::text('tname1',null,['class' => 'form-control', 'id' => 'name1']) !!}	
        </div>
        <div class="form-horizontal">
            <div class="form-group col-lg-6">	
                {!! Form::label('lstatus','Estado Civil:', ['class' => 'label-required','for' => 'ulstatus' ]) !!}
                {!! Form::select('status', ['Solteiro', 'Casado', 'Viuvo'], null, ['class' => 'form-control  ', 'id' => 'ulstatus']) !!}			    		
            </div>
            <div class="form-group col-lg-6 pull-right">
                {!! Form::label('lgenero','Genero:', ['class' => 'label-required','for' => 'genero' ]) !!}								    
                {!! Form::select('genero', [ 'Maculino', 'Feminino'], null, ['class' => 'form-control ', 'id' => 'genero']) !!}			    										
            </div>	
        </div>
    </div>
</div>