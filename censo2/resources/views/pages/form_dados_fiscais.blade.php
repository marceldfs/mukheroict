<div class="panel panel-default">
    <div class="panel-heading ">
        Dados Fiscais
    </div>

    <div class="panel-body">
        <div class="form-group">
            {!! Form::label('lnuit','NUIT:', ['class' => 'label-required','for' => 'nuit'])  !!}
            {!! Form::text('nuit',null,['class' => 'form-control ', 'id' => 'nuit', 'type' => 'number']) !!}
        </div>	

        <div class="form-group">
            {!! Form::label('lninss','Numero INSS:', ['for' => 'ninss'])  !!}
            {!! Form::text('ninss',null,['class' => 'form-control ', 'id' => 'ninss','type' => 'number','placeholder' => 'INSS apenas para trabalhadores inscritos']) !!}
        </div>	


        <div class="form-horizontal">
            <div class="form-group col-lg-6">
                {!! Form::label('ltipodoc','Tipo de documento:', [ 'class' => 'label-required','for' => 'tipodoc' ]) !!}	
                {!! Form::select('tipodoc', [ 'Bilhete de identidade', 'Passaporte','Cedula'], null, ['class' => 'form-control ', 'id' => 'tipodoc']) !!}
            </div>	
            <div class="form-group col-lg-6 pull-right">
                {!! Form::label('lndoc','Numero do documento:', ['class' => 'label-required','for' => 'ndoc'])  !!}
                {!! Form::text('ndoc',null,['class' => 'form-control ', 'id' => 'ndoc']) !!}
            </div>
        </div>

        <div class="form-horizontal">
            <div class="form-group col-lg-6">
                {!! Form::label('ltipocarta','Tipo de Carta de Condu&ccedil;&atilde;o:', [ 'for' => 'tipocarta' ]) !!}	
                {!! Form::select('tipocarta', [ 'A', 'B','C'], null, ['class' => 'form-control ', 'id' => 'tipocarta']) !!}
            </div>	
            <div class="form-group col-lg-6 pull-right">
                {!! Form::label('lncarta','Numero da Carta de Condu&ccedil;&atilde;o:', ['for' => 'ncarta'])  !!}
                {!! Form::text('ncarta',null,['class' => 'form-control ', 'id' => 'ncarta']) !!}
            </div>
        </div>
    </div>	
</div>  