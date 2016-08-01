<div class="panel panel-default">
    <div class="panel-heading ">
        Dados Familiares
    </div>

    <div class="panel-body">
          <div class="form-horizontal">
            <div class="form-group col-lg-6">
            {!! Form::label('lcodfamiliar','Codigo:', ['class' => 'label-required','for' => 'codigo_ex_familiar'])  !!}
            {!! Form::text('codigo_ex_familiar',null,['class' => 'form-control ', 'id' => 'codigo_ex_familiar']) !!}
            </div>	
              
            <div class="form-group col-lg-6 pull-right">
                {!! Form::label('lnomefamiliar','Nome Completo:', [ 'class' => 'label-required','for' => 'nomefamiliar' ]) !!}	
                {!! Form::text('nomefamiliar',null,['class' => 'form-control ', 'id' => 'nomefamiliar']) !!}
            </div>	
           
        </div>
         <div class="form-group  ">
                {!! Form::label('lparentesco','Parentesco:', ['class' => 'label-required','for' => 'parentesco'])  !!}
               {!! Form::select('parentesco', $parentescos, null, ['class' => 'form-control ', 'id' => 'parentesco']) !!}						
            </div>
     
    </div>	
</div>  