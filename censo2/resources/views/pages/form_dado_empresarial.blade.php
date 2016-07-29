<div class="panel panel-default ">
    <div class="panel-heading panel-orange-heading">
        <span class="panel-heading-text"> Dados empresariais </span>
    </div>
    <div class="panel-body">
        <div class=" form-group">
            {!! Form::label('codigo','Codigo:', ['class' => 'label-required','for' => 'codigo'])  !!}
            {!! Form::text('codigo',null,['class' => 'form-control', 'id' => 'codigo']) !!}
        </div>
        <div class=" form-group">	 
            {!! Form::label('lnome','Nome:', ['for' => 'nome' ]) !!}			    		
            {!! Form::text('nome',null,['class' => 'form-control', 'id' => 'nome']) !!}			    		
        </div>
    </div>	
</div> 