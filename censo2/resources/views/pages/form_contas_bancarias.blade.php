<div class="panel panel-default">
    <div class="panel-heading panel-orange-heading">
        <span class="panel-heading-text">Contas Bancarias</span>
    </div>
    <div class="panel-body">
        
        <div class="form-group">
            {!! Form::label('banco','Banco:', ['class' => 'label-required','for' => 'banco_mzn' ]) !!}								    
            {!! Form::select('banco_mzn', $bancos, null, ['class' => 'form-control ', 'id' => 'banco_mzn']) !!}			    										
        </div>
        <div class="form-group {{ $errors->has('numero_conta_mzn') ? ' has-error' : '' }}">
            {!! Form::label('lcontamt','N&deg; de Conta em Meticais:', ['class' => 'label-required','for' => 'numero_conta_mzn'])  !!}
            {!! Form::text('numero_conta_mzn',null,['class' => 'form-control ','type' => 'number', 'id' => 'numero_conta_mzn']) !!}
            @if ($errors->has('numero_conta_mzn'))
            <span class="help-block">
                <strong>{{ $errors->first('numero_conta_mzn') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">									
            {!! Form::label('banco','Banco:', ['for' => 'banco_usd' ]) !!}								    
            {!! Form::select('banco_usd', $bancos, null, ['class' => 'form-control ', 'id' => 'banco_usd']) !!}						
        </div>
        <div class="form-group"> 
            {!! Form::label('lcontausd','N&deg; de Conta em Dolares:', ['for' => 'numero_conta_usd'])  !!}
            {!! Form::text('numero_conta_usd',null,['class' => 'form-control ','type' => 'number', 'id' => 'numero_conta_usd']) !!}
        </div>					    	
    </div>	
</div>  