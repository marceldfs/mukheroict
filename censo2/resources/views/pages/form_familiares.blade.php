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
                <tr>
                    <td contenteditable="true">{!! Form::text('nome1',null,['class' => 'form-control', 'id' => 'nome1']) !!}</td>   
                    <td contenteditable="true">{!! Form::select('parentesco1', $parentescos, null, ['class' => 'form-control ', 'id' => 'parentesco1']) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_nascimento1', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::text('contacto1',null,['class' => 'form-control', 'id' => 'contacto1']) !!}</td>                   
                    <td contenteditable="true">{!! Form::select('tipo_documento1', $tipos_documento, null, ['class' => 'form-control ', 'id' => 'tipo_documento1']) !!}</td>
                    <td contenteditable="true">{!! Form::text('numero_documento1',null,['class' => 'form-control', 'id' => 'numero_documento1']) !!}</td>
                </tr>
                <tr>
                    <td contenteditable="true">{!! Form::text('nome2',null,['class' => 'form-control', 'id' => 'nome2']) !!}</td>   
                    <td contenteditable="true">{!! Form::select('parentesco2', $parentescos, null, ['class' => 'form-control ', 'id' => 'parentesco2']) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_nascimento2', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::text('contacto2',null,['class' => 'form-control', 'id' => 'contacto2']) !!}</td>                  
                    <td contenteditable="true">{!! Form::select('tipo_documento2', $tipos_documento, null, ['class' => 'form-control ', 'id' => 'tipo_documento2']) !!}</td>
                    <td contenteditable="true">{!! Form::text('numero_documento2',null,['class' => 'form-control', 'id' => 'numero_documento2']) !!}</td>
                </tr>
                <tr>
                    <td contenteditable="true">{!! Form::text('nome3',null,['class' => 'form-control', 'id' => 'nome3']) !!}</td>  
                    <td contenteditable="true">{!! Form::select('parentesco3', $parentescos, null, ['class' => 'form-control ', 'id' => 'parentesco3']) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_nascimento3', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::text('contacto3',null,['class' => 'form-control', 'id' => 'contacto3']) !!}</td>                  
                    <td contenteditable="true">{!! Form::select('tipo_documento3', $tipos_documento, null, ['class' => 'form-control ', 'id' => 'tipo_documento3']) !!}</td>
                    <td contenteditable="true">{!! Form::text('numero_documento3',null,['class' => 'form-control', 'id' => 'numero_documento3']) !!}</td>
                </tr>
                <tr>
                    <td contenteditable="true">{!! Form::text('nome4',null,['class' => 'form-control', 'id' => 'nome4']) !!}</td>  
                    <td contenteditable="true">{!! Form::select('parentesco4', $parentescos, null, ['class' => 'form-control ', 'id' => 'parentesco4']) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_nascimento4', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::text('contacto4',null,['class' => 'form-control', 'id' => 'contacto4']) !!}</td>                    
                    <td contenteditable="true">{!! Form::select('tipo_documento4', $tipos_documento, null, ['class' => 'form-control ', 'id' => 'tipo_documento4']) !!}</td>
                    <td contenteditable="true">{!! Form::text('numero_documento4',null,['class' => 'form-control', 'id' => 'numero_documento4']) !!}</td>
                </tr>
                <tr>
                    <td contenteditable="true">{!! Form::text('nome5',null,['class' => 'form-control', 'id' => 'nome5']) !!}</td>     
                    <td contenteditable="true">{!! Form::select('parentesco5', $parentescos, null, ['class' => 'form-control ', 'id' => 'parentesco5']) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_nascimento5', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::text('contacto5',null,['class' => 'form-control', 'id' => 'contacto5']) !!}</td>                   
                    <td contenteditable="true">{!! Form::select('tipo_documento5', $tipos_documento, null, ['class' => 'form-control ', 'id' => 'tipo_documento5']) !!}</td>
                    <td contenteditable="true">{!! Form::text('numero_documento5',null,['class' => 'form-control', 'id' => 'numero_documento5']) !!}</td>
                </tr>          
            </table>
        </div>
    </div>				    	
</div>	

