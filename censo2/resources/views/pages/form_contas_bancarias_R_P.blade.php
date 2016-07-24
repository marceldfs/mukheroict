<div class="panel panel-default">
    <div class="panel-heading panel-orange-heading">
        <span class="panel-heading-text">Contas Bancarias</span>
    </div>
    <div class="panel-body">

        <div class="form-group">
            {!! Form::label('banco','Banco:', ['class' => 'label-required','for' => 'bancometical' ]) !!}								    
            {!! Form::select('bancometical', [ 'bm1', 'bm1','bm1', 'bm1'], null, ['class' => 'form-control ', 'id' => 'bancometical']) !!}			    										
        </div>
        <div class="form-group">
            {!! Form::label('lcontamt','N&deg; de Conta em Metical:', ['class' => 'label-required','for' => 'contamt'])  !!}
            {!! Form::text('contamt',null,['class' => 'form-control ', 'id' => 'contamt']) !!}
        </div>
            
        <div class="form-group">									
            {!! Form::label('banco','Banco:', ['for' => 'bancousd' ]) !!}								    
            {!! Form::select('bancousd', [ 'bm1', 'bm1','bm1', 'bm1'], null, ['class' => 'form-control ', 'id' => 'bancousd']) !!}						
        </div>
        <div class="form-group"> 
            {!! Form::label('lcontausd','N&deg; de Conta em Dolares:', ['for' => 'contausd'])  !!}
            {!! Form::text('contausd',null,['class' => 'form-control ', 'id' => 'contausd']) !!}
        </div>	
        
        <fieldset>
            <legend> Valores da Pens&atilde;o</legend>
         
            <div class="form-group">           
            {!! Form::label('lpensaomz','Pens&atilde;o em Meticais:', ['class' => 'label-required','for' => 'pensaomz'])  !!}
            <span class="input-group-addon" id="basic-addon2">MZN</span>         
            {!! Form::text('pensaomz',null,['class' => 'form-control ', 'id' => 'pensaomz', 'aria-describedby' => 'basic-addon2']) !!}
            
        </div> 
         <div class="form-group">
            {!! Form::label('lpensaous','Pens&atilde;o em Dolares:', ['class' => 'label-required','for' => 'pensaous'])  !!}
           <span class="input-group-addon" id="basic-addon">USD</span>         
            {!! Form::text('pensaous',null,['class' => 'form-control ', 'id' => 'pensaous', 'aria-describedby' => 'basic-addon']) !!}
        </div>   
        </fieldset>
    </div>	
</div>  