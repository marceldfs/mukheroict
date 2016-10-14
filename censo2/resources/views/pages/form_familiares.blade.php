<div class="panel panel-default mukheroHack12">
    <div class="panel-heading panel-orange-heading ">
        <span class="panel-heading-text">Agregado familiar</span>
    </div>
    <div class="panel-body ">
        <div id="table" class="table-editable">            
            <table class="table">
                <tr>
                    <th>Nome</th>
                    <th>Parentesco</th>
                    <th>Data de Nascimento</th>                    
                    <th>Contacto</th>
                    <th>Documento de Suporte</th>
                    <th>Numero documento suporte</th>
                </tr>
                <?php $i = 1; ?>
                @foreach ($familiares as $familiar)
                <tr>
                    <td contenteditable="true">{!! Form::text('nome'.$i, $familiar->nome,['class' => 'form-control', 'id' => 'nome'.$i]) !!}</td>   
                    <td contenteditable="true">{!! Form::select('parentesco'.$i, $parentescos, $familiar->parentesco, ['class' => 'form-control ', 'id' => 'parentesco'.$i]) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_nascimento'.$i, $familiar->data_nascimento) !!}</td>
                    <td contenteditable="true">{!! Form::text('contacto'.$i, $familiar->contacto,['class' => 'form-control', 'id' => 'contacto'.$i]) !!}</td>                   
                    <td contenteditable="true">{!! Form::select('tipo_documento'.$i, $tipos_documento, $familiar->tipo_documento, ['class' => 'form-control ', 'id' => 'tipo_documento'.$i]) !!}</td>
                    <td contenteditable="true">{!! Form::text('numero_documento'.$i, $familiar->numero_documento,['class' => 'form-control', 'id' => 'numero_documento'.$i]) !!}</td>
                </tr>
                <?php $i++; ?>
                @endforeach	          
            </table>
        </div>
    </div>				    	
</div>	

