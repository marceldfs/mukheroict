<div class="panel panel-default">
    <div class="panel-heading ">
        Dados Familiares
    </div>
        
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group col-lg-6 {{ $errors->has('codigo_familiar') ? ' has-error' : '' }}">
                {!! Form::label('lcodfamiliar','Codigo:', ['class' => 'label-required','for' => 'codigo_familiar'])  !!}
                {!! Form::text('codigo_familiar',null,['class' => 'form-control ', 'id' => 'codigo_familiar']) !!}
                @if ($errors->has('codigo_familiar'))
                <span class="help-block">
                    <strong>{{ $errors->first('codigo_familiar') }}</strong>
                </span>
                @endif
            </div>	
                
            <div class="form-group col-lg-6 pull-right">
                {!! Form::label('lparentesco','Parentesco:', ['class' => 'label-required','for' => 'parentesco'])  !!}
                {!! Form::select('parentesco', $parentescos, null, ['class' => 'form-control ', 'id' => 'parentesco']) !!}
            </div>	
                
        </div>
            
    </div>	
</div>  