<div class="panel panel-default mukheroHack12">
    <div class="panel-heading panel-orange-heading ">
        <span class="panel-heading-text">Experiencia EDM</span>
    </div>
    <div class="panel-body ">
        <div id="table" class="table-editable">            
            <table class="table" onload="hide()">
                <tr>
                    <th>Salvar ?</th> 
                    <th>Data de inicio</th>                    
                    <th>Data de fim</th>
                    <th>Direcção</th>
                    <th>Departamento</th>
                    <th>Cargo</th>
                    <th>Profissão</th>
                </tr>
                <?php $i = 1; ?>
                @foreach ($experiencias as $experiencia)
                <tr>   
                    <td contenteditable="true">{!! Form::checkbox('salvarExperienciaEDM'.$i,null,$experiencia->id>=1) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_inicio'.$i, $experiencia->data_inicio) !!}</td>
                    <td contenteditable="true">{!! Form::date('data_fim'.$i, $experiencia->data_fim) !!}</td>
                    <td contenteditable="true">{!! Form::select('direccao'.$i, $direccao, $experiencia->direccao, ['class' => 'form-control ', 'id' => 'direccao'.$i]) !!}</td>
                    <td contenteditable="true">{!! Form::select('departamento'.$i, $departamento, $experiencia->departamento, ['class' => 'form-control ', 'id' => 'departamento'.$i]) !!}</td>
                    <td contenteditable="true">{!! Form::select('cargo'.$i, $cargo, $experiencia->cargo, ['class' => 'form-control ', 'id' => 'cargo'.$i]) !!}</td>
                    <td contenteditable="true">{!! Form::select('profissao'.$i, $profissao, $experiencia->profissao, ['class' => 'form-control ', 'id' => 'profissao'.$i]) !!}</td>
                </tr>
                <?php $i++; ?>
                @endforeach
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
                $('#direccao1').on('change', function(e){
                    console.log(e);
                    var direccao_id = e.target.value;
                
                    $.get('/departamentos/' + direccao_id, function(data) {
                        console.log(data);
                        $('#departamento1').empty();
                        $.each(data, function(index,subCatObj){
                            $('#departamento1').append('<option value="' + subCatObj.id +'">' + subCatObj.descricao + '</option>');
                            console.log(subCatObj);
                        });
                    });
                });
                $('#direccao2').on('change', function(e){
                    console.log(e);
                    var direccao_id = e.target.value;
                
                    $.get('/departamentos/' + direccao_id, function(data) {
                        console.log(data);
                        $('#departamento2').empty();
                        $.each(data, function(index,subCatObj){
                            $('#departamento2').append('<option value="' + subCatObj.id +'">' + subCatObj.descricao + '</option>');
                            console.log(subCatObj);
                        });
                    });
                });
                $('#direccao3').on('change', function(e){
                    console.log(e);
                    var direccao_id = e.target.value;
                
                    $.get('/departamentos/' + direccao_id, function(data) {
                        console.log(data);
                        $('#departamento3').empty();
                        $.each(data, function(index,subCatObj){
                            $('#departamento3').append('<option value="' + subCatObj.id +'">' + subCatObj.descricao + '</option>');
                            console.log(subCatObj);
                        });
                    });
                });
                $('#direccao4').on('change', function(e){
                    console.log(e);
                    var direccao_id = e.target.value;
                
                    $.get('/departamentos/' + direccao_id, function(data) {
                        console.log(data);
                        $('#departamento4').empty();
                        $.each(data, function(index,subCatObj){
                            $('#departamento4').append('<option value="' + subCatObj.id +'">' + subCatObj.descricao + '</option>');
                            console.log(subCatObj);
                        });
                    });
                });
                $('#direccao5').on('change', function(e){
                    console.log(e);
                    var direccao_id = e.target.value;
                
                    $.get('/departamentos/' + direccao_id, function(data) {
                        console.log(data);
                        $('#departamento5').empty();
                        $.each(data, function(index,subCatObj){
                            $('#departamento5').append('<option value="' + subCatObj.id +'">' + subCatObj.descricao + '</option>');
                            console.log(subCatObj);
                        });
                    });
                });
            </script>
        </div>
    </div>				    	
</div>	

