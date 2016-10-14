<div class="panel panel-default mukheroHack12">
    <div class="panel-heading panel-orange-heading ">
        <span class="panel-heading-text">Experiencia EDM</span>
    </div>
    <div class="panel-body ">
        <div id="table" class="table-editable" border="1">            
            <table class="table">
                <tr>                
                    <th>Data da reforma</th>                
                    <th>Direcção</th>
                    
                </tr>
                <tr>           
                    <td contenteditable="true">{!! Form::date('data_reforma', $experiencia_edm_reformado->data_reforma) !!}</td>                    
                    <td contenteditable="true">{!! Form::select('direccao', $direccoes, $experiencia_edm_reformado->direccao, ['class' => 'form-control ','id' => 'direccao']) !!}	</td>                    
                </tr>
                
            </table>
        </div>
    </div>				    	
</div>	

