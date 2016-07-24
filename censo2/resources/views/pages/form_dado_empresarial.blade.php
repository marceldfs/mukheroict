<div class="panel panel-default ">
    <div class="panel-heading panel-orange-heading">
        <span class="panel-heading-text"> Dados empresariais </span>
    </div>
    <div class="panel-body">
        <div class=" form-group">
            {!! Form::label('cod','Codigo:', ['class' => 'label-required','for' => 'cod'])  !!}
            {!! Form::text('cod',null,['class' => 'form-control', 'id' => 'cod']) !!}
        </div>
        <div class=" form-group">	 
            {!! Form::label('lname','Nome:', ['class' => 'label-required','for' => 'name' ]) !!}			    		
            {!! Form::text('tname',null,['class' => 'form-control', 'id' => 'name']) !!}			    		
        </div>
    </div>	
</div> 