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
            {!! Form::label('lcontamt','Pens&atilde;o em Meticais:', ['class' => 'label-required','for' => 'contamt'])  !!}
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
    </div>	
</div>  