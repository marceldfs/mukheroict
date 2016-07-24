<div class="panel panel-default">
    <div class="panel-heading panel-red-heading">
        <span class="panel-heading-text"> Outras Informações</span> <span class="heading-sm-alert panel-heading-text">(reservado aos tecnicos)</span>
    </div>
    <div class="panel-body">

        <div class="form-horizontal">

            <div class="form-group col-lg-4">
                {!! Form::label('lcamisetes','Tamanho das Camisetes :', [ 'class' => 'label-required','for' => 'scamisetes' ]) !!}	
                {!! Form::select('scamisetes', [ 'S', 'L','XL'], null, ['class' => 'form-control ', 'id' => 'scamisetes']) !!}
            </div>	
            <div class="form-group col-lg-4 ">
                {!! Form::label('lbotas','Tamanho das botas:', ['class' => 'label-required','for' => 'sbotas'])  !!}
                {!! Form::select('sbotas', [ 'S', 'L','XL'], null, ['class' => 'form-control ', 'id' => 'sbotas']) !!}
            </div>
            <div class="form-group col-lg-4">
                {!! Form::label('lfato','Tamanho do fato das operações:', ['class' => 'label-required','for' => 'sfato'])  !!}
                {!! Form::select('sfato', [ 'S', 'L','XL'], null, ['class' => 'form-control ', 'id' => 'sfato']) !!}
            </div>

        </div>

        <!--Capacete e sangue-->
        <div class="form-horizontal">
            <div class="form-group col-lg-6">
                {!! Form::label('lcapacete','Tamanho do capacete:', ['class' => 'label-required', 'for' => 'scapacete' ]) !!}	
                {!! Form::select('scapacete', [ 'S', 'L','XL'], null, ['class' => 'form-control ', 'id' => 'scapacete']) !!}
            </div>	
            <div class="form-group col-lg-6 pull-right">
                {!! Form::label('lsangue','Tipo sanguineo:', [ 'class' => 'label-required','for' => 'ssangue' ]) !!}	
                {!! Form::select('ssangue', [ 'S', 'L','XL'], null, ['class' => 'form-control ', 'id' => 'ssangue']) !!}
            </div>
        </div>

    </div>
</div>	