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
                <?php $i = 1; ?>
                @foreach ($experiencias as $experiencia)
                <tr>
                    <td contenteditable="true">{!! Form::checkbox('salvarExperienciaOutra'.$i,null,$experiencia->id>=1) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_inicio'.$i, $experiencia->data_inicio) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_fim'.$i, $experiencia->data_fim) !!}</td>
                    <td contenteditable="true">{!! Form::text('instituicao'.$i,$experiencia->instituicao,['class' => 'form-control', 'id' => 'instituicao'.$i]) !!}</td>
                    <td contenteditable="true">{!! Form::text('cargo'.$i,$experiencia->cargo,['class' => 'form-control', 'id' => 'cargo'.$i]) !!}</td>
                    <td contenteditable="true">{!! Form::text('profissao'.$i,$experiencia->profissao,['class' => 'form-control', 'id' => 'profissao'.$i]) !!}</td>
                </tr>
                <?php $i++; ?>
                @endforeach      
            </table>
        </div>
    </div>				    	
</div>	

