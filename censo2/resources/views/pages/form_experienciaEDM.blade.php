<div class="panel panel-default mukheroHack12">
    <div class="panel-heading panel-orange-heading ">
        <span class="panel-heading-text">Experiencia EDM</span>
    </div>
    <div class="panel-body ">
        <div id="table" class="table-editable">            
            <table class="table" onload="hide()">
                <tr>
                    <th>Salvar ?</th> 
                    <th>Data de admissao</th>                    
                    <th>Data de integracao</th>
                    <th>Situacao</th>
                    <th>Direcção</th>
                    <th>Carreira</th>
                    <th>Departamento</th>
                    <th>Cargo</th>
                    <th>Profissão</th>
                </tr>
                <tr>   
                    <td contenteditable="true">{!! Form::checkbox('salvarExperienciaEDM1') !!}</td>
                    <td contenteditable="true">{!! Form::date('data_admissao1', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_integracao1', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::select('situacao1', $situacao, null, ['class' => 'form-control ', 'id' => 'situacao1']) !!}</td>
                    <td contenteditable="true">{!! Form::select('direccao1', $direccao, null, ['class' => 'form-control ', 'id' => 'direccao1']) !!}</td>
                    <td contenteditable="true">{!! Form::select('carreira1', $carreira, null, ['class' => 'form-control ', 'id' => 'carreira1']) !!}</td>
                    <td contenteditable="true">{!! Form::select('departamento1', $departamento, null, ['class' => 'form-control ', 'id' => 'departamento1']) !!}</td>
                    <td contenteditable="true">{!! Form::select('cargo1', $cargo, null, ['class' => 'form-control ', 'id' => 'cargo1']) !!}</td>
                    <td contenteditable="true">{!! Form::select('profissao1', $profissao, null, ['class' => 'form-control ', 'id' => 'profissao1']) !!}</td>
                </tr>
                <tr id="2">
                    <td contenteditable="true">{!! Form::checkbox('salvarExperienciaEDM2') !!}</td>
                    <td contenteditable="true">{!! Form::date('data_admissao2', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_integracao2', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::select('situacao2', $situacao, null, ['class' => 'form-control ', 'id' => 'situacao2']) !!}</td>
                    <td contenteditable="true">{!! Form::select('direccao2', $direccao, null, ['class' => 'form-control ', 'id' => 'direccao2']) !!}</td>
                    <td contenteditable="true">{!! Form::select('carreira2', $carreira, null, ['class' => 'form-control ', 'id' => 'carreira2']) !!}</td>
                    <td contenteditable="true">{!! Form::select('departamento2', $departamento, null, ['class' => 'form-control ', 'id' => 'departamento2']) !!}</td>
                    <td contenteditable="true">{!! Form::select('cargo2', $cargo, null, ['class' => 'form-control ', 'id' => 'cargo2']) !!}</td>
                    <td contenteditable="true">{!! Form::select('profissao2', $profissao, null, ['class' => 'form-control ', 'id' => 'profissao2']) !!}</td>
                </tr>
                <tr id="3">
                    <td contenteditable="true">{!! Form::checkbox('salvarExperienciaEDM3') !!}</td>
                    <td contenteditable="true">{!! Form::date('data_admissao3', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_integracao3', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::select('situacao3', $situacao, null, ['class' => 'form-control ', 'id' => 'situacao3']) !!}</td>
                    <td contenteditable="true">{!! Form::select('direccao3', $direccao, null, ['class' => 'form-control ', 'id' => 'direccao3']) !!}</td>
                    <td contenteditable="true">{!! Form::select('carreira3', $carreira, null, ['class' => 'form-control ', 'id' => 'carreira3']) !!}</td>
                    <td contenteditable="true">{!! Form::select('departamento3', $departamento, null, ['class' => 'form-control ', 'id' => 'departamento3']) !!}</td>
                    <td contenteditable="true">{!! Form::select('cargo3', $cargo, null, ['class' => 'form-control ', 'id' => 'cargo3']) !!}</td>
                    <td contenteditable="true">{!! Form::select('profissao3', $profissao, null, ['class' => 'form-control ', 'id' => 'profissao3']) !!}</td>
                </tr>
                <tr id="4">
                    <td contenteditable="true">{!! Form::checkbox('salvarExperienciaEDM4') !!}</td>
                    <td contenteditable="true">{!! Form::date('data_admissao4', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_integracao4', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::select('situacao4', $situacao, null, ['class' => 'form-control ', 'id' => 'situacao4']) !!}</td>
                    <td contenteditable="true">{!! Form::select('direccao4', $direccao, null, ['class' => 'form-control ', 'id' => 'direccao4']) !!}</td>
                    <td contenteditable="true">{!! Form::select('carreira4', $carreira, null, ['class' => 'form-control ', 'id' => 'carreira4']) !!}</td>
                    <td contenteditable="true">{!! Form::select('departamento4', $departamento, null, ['class' => 'form-control ', 'id' => 'departamento4']) !!}</td>
                    <td contenteditable="true">{!! Form::select('cargo4', $cargo, null, ['class' => 'form-control ', 'id' => 'cargo4']) !!}</td>
                    <td contenteditable="true">{!! Form::select('profissao4', $profissao, null, ['class' => 'form-control ', 'id' => 'profissao4']) !!}</td>
                </tr>
                <tr id="5">
                    <td contenteditable="true">{!! Form::checkbox('salvarExperienciaEDM5') !!}</td>
                    <td contenteditable="true">{!! Form::date('data_admissao5', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_integracao5', \Carbon\Carbon::now()) !!}</td>
                    <td contenteditable="true">{!! Form::select('situacao5', $situacao, null, ['class' => 'form-control ', 'id' => 'situacao5']) !!}</td>
                    <td contenteditable="true">{!! Form::select('direccao5', $direccao, null, ['class' => 'form-control ', 'id' => 'direccao5']) !!}</td>
                    <td contenteditable="true">{!! Form::select('carreira5', $carreira, null, ['class' => 'form-control ', 'id' => 'carreira5']) !!}</td>
                    <td contenteditable="true">{!! Form::select('departamento5', $departamento, null, ['class' => 'form-control ', 'id' => 'departamento5']) !!}</td>
                    <td contenteditable="true">{!! Form::select('cargo5', $cargo, null, ['class' => 'form-control ', 'id' => 'cargo5']) !!}</td>
                    <td contenteditable="true">{!! Form::select('profissao5', $profissao, null, ['class' => 'form-control ', 'id' => 'profissao5']) !!}</td>
                </tr> 
            </table>
            <!--<button type="button" name="data" onclick="check()"/>+</button>-->
            <script>
                function check()
                {
                    if(document.getElementsByClassName("1")[0].style.display == "none")
                    {
                        var lst = document.getElementsByClassName("1");
                        for(var i = 0; i < lst.length; ++i) {
                            lst[i].style.display = 'inline';
                        }
                        return ;
                    }
                    if(document.getElementById("2").style.display == "none")
                    {
                        document.getElementById("2").style.display = "inline";
                        return ;
                    }
                    if(document.getElementById("3").style.display == "none")
                    {
                        document.getElementById("3").style.display = "inline";
                        return ;}
                    if(document.getElementById("4").style.display == "none")
                    {
                        document.getElementById("4").style.display = "inline";
                        return ;}
                    if(document.getElementById("5").style.display == "none")
                    {
                        document.getElementById("5").style.display = "inline";
                        return ;}
                    
                }
            </script>
        </div>
    </div>				    	
</div>	

