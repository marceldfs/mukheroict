<div class="panel panel-default">
    <div class="panel-heading panel-orange-heading">
        <span class="panel-heading-text">Contas Bancarias</span>
    </div>
    <div class="panel-body">
        
        <div class="form-group">
            {!! Form::label('banco','Banco:', ['class' => 'label-required','for' => 'banco_mzn' ]) !!}								    
            {!! Form::select('banco_mzn', $bancos, $funcionario->banco_mzn, ['class' => 'form-control ', 'id' => 'banco_mzn']) !!}			    										
        </div>
        <div class="form-group {{ $errors->has('numero_conta_mzn') ? ' has-error' : '' }}">
            {!! Form::label('lcontamt','N&deg; de Conta em Metical:', ['class' => 'label-required','for' => 'numero_conta_mzn'])  !!}
            {!! Form::text('numero_conta_mzn',$funcionario->numero_conta_mzn,['class' => 'form-control ', 'id' => 'numero_conta_mzn', 'readonly' => 'true']) !!}
            @if ($errors->has('numero_conta_mzn'))
            <span class="help-block">
                <strong>{{ $errors->first('numero_conta_mzn') }}</strong>
            </span>
            @endif
        </div>
        
        <div class="form-group">									
            {!! Form::label('banco','Banco:', ['for' => 'banco_usd' ]) !!}								    
            {!! Form::select('banco_usd', $bancos, $funcionario->banco_usd, ['class' => 'form-control ', 'id' => 'banco_usd']) !!}						
        </div>
        <div class="form-group"> 
            {!! Form::label('lcontausd','N&deg; de Conta em Dolares:', ['for' => 'numero_conta_usd'])  !!}
            {!! Form::text('numero_conta_usd',$funcionario->numero_conta_usd,['class' => 'form-control ', 'id' => 'numero_conta_usd', 'readonly' => 'true']) !!}
        </div>	
        
        <fieldset>
            <legend> Valores da Pens&atilde;o</legend>
            
            <div class="form-group {{ $errors->has('pensao_reforma_mzn') ? ' has-error' : '' }}">           
                {!! Form::label('lpensaomz','Pens&atilde;o em Meticais:', ['class' => 'label-required','for' => 'pensao_reforma_mzn'])  !!}
                <span class="input-group-addon" id="basic-addon2">MZN</span>         
                {!! Form::text('pensao_reforma_mzn',(isset($funcionario_pensionista)) ? $funcionario_pensionista->pensao_mzn : $funcionario_reformado->pensao_reforma_mzn ,
                ['class' => 'form-control ', 'id' => 'pensao_reforma_mzn', 'aria-describedby' => 'basic-addon2', 'readonly' => 'true']) !!}
                @if ($errors->has('pensao_reforma_mzn'))
                <span class="help-block">
                    <strong>{{ $errors->first('pensao_reforma_mzn') }}</strong>
                </span>
                @endif
                
            </div> 
            <div class="form-group">
                {!! Form::label('lpensaous','Pens&atilde;o em Dolares:', ['class' => 'label-required','for' => 'pensao_reforma_usd'])  !!}
                <span class="input-group-addon" id="basic-addon">USD</span>         
                {!! Form::text('pensao_reforma_usd',(isset($funcionario_pensionista)) ? $funcionario_pensionista->pensao_usd : $funcionario_reformado->pensao_reforma_usd,
                ['class' => 'form-control ', 'id' => 'pensao_reforma_usd', 'aria-describedby' => 'basic-addon', 'readonly' => 'true']) !!}
            </div>   
        </fieldset>
    </div>	
</div>  