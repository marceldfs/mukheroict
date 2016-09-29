<div class="panel panel-default mukheroHack12">
    <div class="panel-heading panel-orange-heading ">
        <span class="panel-heading-text">Experiencia em outras empresas</span>
    </div>
    <div class="panel-body ">
        <div id="table" class="table-editable">            
            <table class="table">
                <tr> 
                    <th>Salvar ?</th>
                    <th>Data de Inicio</th>
                    <th>Data de Fim</th>
                    <th>Instituição</th>                   
                    <th>Cargo</th>
                    <th>Profissão</th>
                </tr>
                <tr>
                    <td contenteditable="true">{!! Form::checkbox('salvarExperienciaOutra1') !!}</td>
                    <td contenteditable="true">{!! Form::date('data_inicio1', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_fim1', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::text('instituicao1',null,['class' => 'form-control', 'id' => 'instituicao1']) !!}</td>
                    <td contenteditable="true">{!! Form::text('cargo1',null,['class' => 'form-control', 'id' => 'cargo1']) !!}</td>
                    <td contenteditable="true">{!! Form::text('profissao1',null,['class' => 'form-control', 'id' => 'profissao1']) !!}</td>
                </tr>
                <tr>
                    <td contenteditable="true">{!! Form::checkbox('salvarExperienciaOutra2') !!}</td>
                    <td contenteditable="true">{!! Form::date('data_inicio2', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_fim2', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::text('instituicao2',null,['class' => 'form-control', 'id' => 'instituicao2']) !!}</td>
                    <td contenteditable="true">{!! Form::text('cargo2',null,['class' => 'form-control', 'id' => 'cargo2']) !!}</td>
                    <td contenteditable="true">{!! Form::text('profissao2',null,['class' => 'form-control', 'id' => 'profissao2']) !!}</td>
                </tr>
                <tr>
                    <td contenteditable="true">{!! Form::checkbox('salvarExperienciaOutra3') !!}</td>
                    <td contenteditable="true">{!! Form::date('data_inicio3', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_fim3', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::text('instituicao3',null,['class' => 'form-control', 'id' => 'instituicao3']) !!}</td>
                    <td contenteditable="true">{!! Form::text('cargo3',null,['class' => 'form-control', 'id' => 'cargo3']) !!}</td>
                    <td contenteditable="true">{!! Form::text('profissao3',null,['class' => 'form-control', 'id' => 'profissao3']) !!}</td>
                </tr>
                <tr>
                    <td contenteditable="true">{!! Form::checkbox('salvarExperienciaOutra4') !!}</td>
                    <td contenteditable="true">{!! Form::date('data_inicio4', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_fim4', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::text('instituicao4',null,['class' => 'form-control', 'id' => 'instituicao4']) !!}</td>
                    <td contenteditable="true">{!! Form::text('cargo4',null,['class' => 'form-control', 'id' => 'cargo4']) !!}</td>
                    <td contenteditable="true">{!! Form::text('profissao4',null,['class' => 'form-control', 'id' => 'profissao4']) !!}</td>
                </tr>
                <tr>
                    <td contenteditable="true">{!! Form::checkbox('salvarExperienciaOutra5') !!}</td>
                    <td contenteditable="true">{!! Form::date('data_inicio5', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_fim5', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::text('instituicao5',null,['class' => 'form-control', 'id' => 'instituicao5']) !!}</td>
                    <td contenteditable="true">{!! Form::text('cargo5',null,['class' => 'form-control', 'id' => 'cargo5']) !!}</td>
                    <td contenteditable="true">{!! Form::text('profissao5',null,['class' => 'form-control', 'id' => 'profissao5']) !!}</td>
                </tr>      
            </table>
        </div>
    </div>				    	
</div>	

