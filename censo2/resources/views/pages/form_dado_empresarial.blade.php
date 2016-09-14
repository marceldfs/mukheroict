<div class="panel panel-default ">
    <div class="panel-heading panel-orange-heading">
        <span class="panel-heading-text"> Dados empresariais </span>
    </div>
    <div class="panel-body">
        <div class=" form-group {{ $errors->has('codigo') ? ' has-error' : '' }}">
            {!! Form::label('codigo','Codigo:', ['class' => 'label-required','for' => 'codigo'])  !!}
            {!! Form::text('codigo',null,['class' => 'form-control', 'id' => 'codigo', 'onChange'=>'getNome()']) !!}
            @if ($errors->has('codigo'))
            <span class="help-block">
                <strong>{{ $errors->first('codigo') }}</strong>
            </span>
            @endif
        </div>
        <script>         
            function getNome(){
                var formData = {
                    _token: '<?php echo csrf_token() ?>',
                    codigo: $('#codigo').val(),
                } 
                
                $.ajax({
                    type:'GET',
                    url:'/getName',
                    data: formData,
                    dataType: "json",
                    success:function(data){
                        document.getElementById("nome").value = data.msg;
                        if(document.getElementById("nome").value!="Funcionario nao existente! Coloque um codigo valido!")
                        {
                            document.getElementById('nome_completo').readOnly = false;
                            document.getElementById('nuit').readOnly = false;
                            document.getElementById('numero_documento').readOnly = false;
                            document.getElementById('numero_conta_mzn').readOnly = false;
                            document.getElementById('numero_conta_usd').readOnly = false;
                            document.getElementById('localidade').readOnly = false;
                            document.getElementById('celular').readOnly = false;
                            document.getElementById('celular_alternativo').readOnly = false;
                            document.getElementById('morada').readOnly = false;
                            document.getElementById('email').readOnly = false;
                            try{
                                document.getElementById('numero_inss').readOnly = false;
                                document.getElementById('numero_carta_conducao').readOnly = false;
                            }catch(err){} 
                            try{  
                                document.getElementById('pensao_reforma_mzn').readOnly = false;
                                document.getElementById('pensao_reforma_usd').readOnly = false;
                            }catch(err){}
                            try{  
                                document.getElementById('codigo_familiar').readOnly = false;
                            }catch(err){}
                        }
                        else
                        {
                            document.getElementById('nome_completo').readOnly = true;
                            document.getElementById('nuit').readOnly = true;
                            document.getElementById('numero_documento').readOnly = true;
                            document.getElementById('numero_conta_mzn').readOnly = true;
                            document.getElementById('numero_conta_usd').readOnly = true;
                            document.getElementById('localidade').readOnly = true;
                            document.getElementById('celular').readOnly = true;
                            document.getElementById('celular_alternativo').readOnly = true;
                            document.getElementById('morada').readOnly = true;
                            document.getElementById('email').readOnly = true;
                            try{
                                document.getElementById('numero_inss').readOnly = true;
                                document.getElementById('numero_carta_conducao').readOnly = true;
                            }catch(err){}
                            try{  
                                document.getElementById('pensao_reforma_mzn').readOnly = true;
                                document.getElementById('pensao_reforma_usd').readOnly = true;
                            }catch(err){}
                            try{  
                                document.getElementById('codigo_familiar').readOnly = true;
                            }catch(err){}
                        }
                    }
                });
            }
        </script>
        <div class=" form-group">	 
            {!! Form::label('lnome','Nome:', ['for' => 'nome' ]) !!}			    		
            {!! Form::text('nome',null,['class' => 'form-control', 'id' => 'nome', 'readonly' => 'true']) !!}			    		
        </div>
    </div>	
</div> 