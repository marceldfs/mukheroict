<div class="panel panel-default mukheroHack12">
    <div class="panel-heading panel-orange-heading ">
        <span class="panel-heading-text">Qualificacoes</span>
    </div>
    <div class="panel-body ">
        <div id="table" class="table-editable">            
            <table class="table">
                <tr>
                    <th>Salvar ?</th> 
                    <th>Instituicao</th>
                    <th>Curso</th>
                    <th>Certificado</th>
                    <th>Data de Inicio</th>
                    <th>Data de Fim</th>   
                </tr>
                <tr>
                    <td contenteditable="true">{!! Form::checkbox('salvarQualificacao1') !!}</td>
                    <td contenteditable="true">{!! Form::select('instituicao1', $instituicao, null, ['class' => 'form-control ', 'id' => 'instituicao1']) !!}</td>
                    <td contenteditable="true">{!! Form::text('curso1',null,['class' => 'form-control', 'id' => 'curso1']) !!}</td>
                    <td contenteditable="true">{!! Form::select('certificado1', $certificado, null, ['class' => 'form-control ', 'id' => 'certificado1']) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_inicio1', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_fim1', \Carbon\Carbon::now()) !!}</td>
                </tr>
                <tr>
                    <td contenteditable="true">{!! Form::checkbox('salvarQualificacao2') !!}</td>
                    <td contenteditable="true">{!! Form::select('instituicao2', $instituicao, null, ['class' => 'form-control ', 'id' => 'instituicao2']) !!}</td>
                    <td contenteditable="true">{!! Form::text('curso2',null,['class' => 'form-control', 'id' => 'curso2']) !!}</td>
                    <td contenteditable="true">{!! Form::select('certificado2', $certificado, null, ['class' => 'form-control ', 'id' => 'certificado2']) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_inicio2', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_fim2', \Carbon\Carbon::now()) !!}</td>
                </tr>
                <tr>
                    <td contenteditable="true">{!! Form::checkbox('salvarQualificacao3') !!}</td>
                    <td contenteditable="true">{!! Form::select('instituicao3', $instituicao, null, ['class' => 'form-control ', 'id' => 'instituicao3']) !!}</td>
                    <td contenteditable="true">{!! Form::text('curso3',null,['class' => 'form-control', 'id' => 'curso3']) !!}</td>
                    <td contenteditable="true">{!! Form::select('certificado3', $certificado, null, ['class' => 'form-control ', 'id' => 'certificado3']) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_inicio3', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_fim3', \Carbon\Carbon::now()) !!}</td>
                </tr>
                <tr>
                    <td contenteditable="true">{!! Form::checkbox('salvarQualificacao4') !!}</td>
                    <td contenteditable="true">{!! Form::select('instituicao4', $instituicao, null, ['class' => 'form-control ', 'id' => 'instituicao4']) !!}</td>
                    <td contenteditable="true">{!! Form::text('curso4',null,['class' => 'form-control', 'id' => 'curso4']) !!}</td>
                    <td contenteditable="true">{!! Form::select('certificado4', $certificado, null, ['class' => 'form-control ', 'id' => 'certificado4']) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_inicio4', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_fim4', \Carbon\Carbon::now()) !!}</td>
                </tr>
                <tr>
                    <td contenteditable="true">{!! Form::checkbox('salvarQualificacao5') !!}</td>
                    <td contenteditable="true">{!! Form::select('instituicao5', $instituicao, null, ['class' => 'form-control ', 'id' => 'instituicao5']) !!}</td>
                    <td contenteditable="true">{!! Form::text('curso5',null,['class' => 'form-control', 'id' => 'curso5']) !!}</td>
                    <td contenteditable="true">{!! Form::select('certificado5', $certificado, null, ['class' => 'form-control ', 'id' => 'certificado5']) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_inicio5', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_fim5', \Carbon\Carbon::now()) !!}</td>
                </tr>               
            </table>
        </div>
    </div>				    	
</div>	

