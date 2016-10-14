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
                <?php $i = 1; ?>
                @foreach ($qualificacoes as $qualificacao)
                <tr>
                    <td contenteditable="true">{!! Form::checkbox('salvarQualificacao'.$i,null,$qualificacao->id>=1) !!}</td>
                    <td contenteditable="true">{!! Form::select('instituicao'.$i, $instituicao, $qualificacao->instituicao, ['class' => 'form-control ', 'id' => 'instituicao'.$i]) !!}</td>
                    <td contenteditable="true">{!! Form::text('curso'.$i,$qualificacao->curso,['class' => 'form-control', 'id' => 'curso'.$i]) !!}</td>
                    <td contenteditable="true">{!! Form::select('certificado'.$i, $certificado, $qualificacao->certificado, ['class' => 'form-control ', 'id' => 'certificado'.$i]) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_inicio'.$i, $qualificacao->data_inicio) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_fim'.$i, $qualificacao->data_fim) !!}</td>
                </tr>  
                <?php $i++; ?>
                @endforeach
            </table>
        </div>
    </div>				    	
</div>	

