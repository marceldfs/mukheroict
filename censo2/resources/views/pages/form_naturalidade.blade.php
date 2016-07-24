<div class="panel panel-default">
    <div class="panel-heading panel-orange-heading">
        <span class="panel-heading-text">Naturalidade</span>
    </div>
    <div class="panel-body">
        <div class="form-group">
            {!! Form::label('ldatanasc','Data de Nascimento:', ['class' => 'label-required','for' => 'datanasc' ]) !!}	
            {!! Form::date('name', \Carbon\Carbon::now()) !!}
        </div>
        <div class="form-group">									
            {!! Form::label('lprov','Provincia:', ['class' => 'label-required','for' => 'provincia' ]) !!}								    
            {!! Form::select('provincia', [ 'Provincia1', 'Provi2','Provincia1', 'Provi2'], null, ['class' => 'form-control ', 'id' => 'provincia']) !!}			    										
        </div>
        <div class="form-group">
            {!! Form::label('ldistrito','Distrito:', ['for' => 'distrito' ]) !!}								    
            {!! Form::select('distrito', [ 'Provincia1', 'Provi2','Provincia1', 'Provi2'], null, ['class' => 'form-control ', 'id' => 'distrito']) !!}			    										
        </div>						    	
    </div>	
</div>  