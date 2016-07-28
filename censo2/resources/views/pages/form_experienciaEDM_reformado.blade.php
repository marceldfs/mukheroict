<div class="panel panel-default mukheroHack12">
    <div class="panel-heading panel-orange-heading ">
        <span class="panel-heading-text">Qualificacoes</span>
    </div>
    <div class="panel-body ">
        <div id="table" class="table-editable">            
            <table class="table">
                <tr>
                    <th>Codigo</th>                    
                    <th>Data da reforma</th>                
                    <th>Direcção</th>
                    
                </tr>
                <tr>
                    <td contenteditable="true"></td>                
                    <td contenteditable="true">{!! Form::date('name', \Carbon\Carbon::now()) !!}</td>                    
                    <td contenteditable="true">{!! Form::select('sDirecao', [ 'S', 'L','XL'], null, ['class' => 'form-control ', 'id' => 'sintituicao']) !!}</td>                    
                </tr>
                  
            </table>
        </div>
    </div>				    	
</div>	

