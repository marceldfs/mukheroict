<div class="panel panel-default">
    <div class="panel-heading">
        Morada/Contactos
    </div>

    <div class="panel-body">

        <div class="form-horizontal">
            <!--PROVINCIA E DISTRITO-->
            <div class="form-group col-lg-6">
                {!! Form::label('lprov','Provincia:', [ 'class' => 'label-required','for' => 'sprov' ]) !!}	
                {!! Form::select('sprov', [ 'Prov1', 'Prov2','Prov3'], null, ['class' => 'form-control ', 'id' => 'sprov']) !!}
            </div>	
            <div class="form-group col-lg-6 pull-right">
                {!! Form::label('ldistr','Distrito:', ['for' => 'sdistr'])  !!}
                {!! Form::select('sdistr', [ 'Distr1', 'Distr1','Distr1'], null, ['class' => 'form-control ', 'id' => 'sdistr']) !!}
            </div>
        </div>

        <!--Pais E lcaoliadade-->
        <div class="form-horizontal">
            <div class="form-group col-lg-6">
                {!! Form::label('lpais','Pais:', [ 'for' => 'spais' ]) !!}	
                {!! Form::select('spais', [ 'P1', 'P2','P3'], null, ['class' => 'form-control ', 'id' => 'spais']) !!}
            </div>	
            <div class="form-group col-lg-6 pull-right">
                {!! Form::label('llocalidade','Localidade:', ['for' => 'slocalidade'])  !!}
                {!! Form::select('slocalidade', [ 'local1', 'local1','local1'], null, ['class' => 'form-control ', 'id' => 'slocalidade']) !!}
            </div>
        </div>
        <div class="form-horizontal">
            <!--Celulares-->
            <div class="form-group col-lg-6">
                {!! Form::label('lcel','Numero de Celular:', ['class' => 'label-required','for' => 'tcel'])  !!}
                {!! Form::text('tcel',null,['class' => 'form-control ', 'id' => 'tcel', 'type' => 'number','placeholder' => 'n&atilde;o use letras']) !!}
            </div>	
            <div class="form-group col-lg-6 pull-right">
                {!! Form::label('ltel','Numero de Celular alternativo:', ['for' => 'ttel'])  !!}
                {!! Form::text('ttel',null,['class' => 'form-control ', 'id' => 'ttel', 'type' => 'number','placeholder' => 'n&atilde;o use letras']) !!}
            </div>	
            <div class="form-group col-lg-12"> 
                {!! Form::label('lmorada','Morada:', ['class' => 'label-required','for' => 'tmorada'])  !!}
                {!! Form::text('tmorada',null,['class' => 'form-control ', 'id' => 'tmorada']) !!}
            </div>
            <div class="form-group col-lg-12"> 									
                {!! Form::label('lemail','Email:', ['class' => 'label-required','for' => 'temail'])  !!}
                {!! Form::text('temail',null,['class' => 'form-control ', 'id' => 'temail', 'type'=>'email','placeholder' => 'email@edm.co.mz']) !!}
            </div>											
        </div>													
    </div>
</div>