<div class="panel panel-default">
    <div class="panel-heading ">
        Dados Fiscais
    </div>

    <div class="panel-body">
        <div class="form-group">
            {!! Form::label('lnuit','NUIT:', ['class' => 'label-required','for' => 'nuit'])  !!}
            {!! Form::text('nuit',null,['class' => 'form-control ', 'id' => 'nuit', 'type' => 'number']) !!}
        </div>	
        <div class="form-horizontal">
            <div class="form-group col-lg-6">
                {!! Form::label('ltipodoc','Tipo de documento:', [ 'class' => 'label-required','for' => 'tipo_documento' ]) !!}	
                {!! Form::select('tipo_documento', $tipos_documento, null, ['class' => 'form-control ', 'id' => 'tipo_documento']) !!}
            </div>	
            <div class="form-group col-lg-6 pull-right">
                {!! Form::label('lndoc','Numero do documento:', ['class' => 'label-required','for' => 'numero_documento'])  !!}
                {!! Form::text('numero_documento',null,['class' => 'form-control ', 'id' => 'numero_documento']) !!}
            </div>
        </div>
    </div>	
</div>  