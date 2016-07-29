<div class="panel panel-default">
    <div class="panel-heading panel-red-heading">
        <span class="panel-heading-text"> Outras Informações</span> <span class="heading-sm-alert panel-heading-text">(reservado aos tecnicos)</span>
    </div>
    <div class="panel-body">

        <div class="form-horizontal">

            <div class="form-group col-lg-4">
                {!! Form::label('lcamisetes','Tamanho das Camisetes :', [ 'class' => 'label-required','for' => 'tamanho_camisete' ]) !!}	
                {!! Form::select('tamanho_camisete', $tamanhos_letra, null, ['class' => 'form-control ', 'id' => 'tamanho_camisete']) !!}
            </div>	
            <div class="form-group col-lg-4 ">
                {!! Form::label('lbotas','Tamanho das botas:', ['class' => 'label-required','for' => 'tamanho_botas'])  !!}
                {!! Form::select('tamanho_botas', $tamanhos_numero, null, ['class' => 'form-control ', 'id' => 'tamanho_botas']) !!}
            </div>
            <div class="form-group col-lg-4">
                {!! Form::label('lfato','Tamanho do fato das operações:', ['class' => 'label-required','for' => 'tamanho_fato'])  !!}
                {!! Form::select('tamanho_fato', $tamanhos_letra, null, ['class' => 'form-control ', 'id' => 'tamanho_fato']) !!}
            </div>

        </div>

        <!--Capacete e sangue-->
        <div class="form-horizontal">
            <div class="form-group col-lg-6">
                {!! Form::label('tamanho_capacete','Tamanho do capacete:', ['class' => 'label-required', 'for' => 'tamanho_capacete' ]) !!}	
                {!! Form::select('tamanho_capacete', $tamanhos_numero, null, ['class' => 'form-control ', 'id' => 'tamanho_capacete']) !!}
            </div>	
            <div class="form-group col-lg-6 pull-right">
                {!! Form::label('lsangue','Tipo sanguineo:', [ 'class' => 'label-required','for' => 'tipo_sanguineo' ]) !!}	
                {!! Form::select('tipo_sanguineo', $tipos_sanguineo, null, ['class' => 'form-control ', 'id' => 'tipo_sanguineo']) !!}
            </div>
        </div>

    </div>
</div>	