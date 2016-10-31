<div class="panel panel-default">
    <div class="panel-heading ">
        Dados Familiares
    </div>
        
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="form-group col-lg-6 {{ $errors->has('codigo_familiar') ? ' has-error' : '' }}">
                {!! Form::label('lcodfamiliar','Codigo:', ['class' => 'label-required','for' => 'codigo_familiar'])  !!}
                {!! Form::text('codigo_familiar',$funcionario_pensionista->codigo_ex_familiar,['class' => 'form-control ', 'id' => 'codigo_familiar', 
                'readonly' => 'true', 'onChange'=>'getCodigo()', 'onClick'=>'getCodigo()']) !!}
                @if ($errors->has('codigo_familiar'))
                <span class="help-block">
                    <strong>{{ $errors->first('codigo_familiar') }}</strong>
                </span>
                @endif
            </div>	
            <script>         
            function getCodigo(){
                var formData = {
                    _token: '<?php echo csrf_token() ?>',
                    codigo: $('#codigo_familiar').val(),
                } 
                
                $.ajax({
                    type:'GET',
                    url:'/getCodigo',
                    data: formData,
                    dataType: "json",
                    success:function(data){
                        document.getElementById("codigo_familiar").value = data.msg;
                    }
                });
            }
        </script>
                
            <div class="form-group col-lg-6 pull-right">
                {!! Form::label('lparentesco','Parentesco:', ['class' => 'label-required','for' => 'parentesco'])  !!}
                {!! Form::select('parentesco', $parentescos, $funcionario_pensionista->parentesco, ['class' => 'form-control ', 'id' => 'parentesco']) !!}
            </div>	
                
        </div>
            
    </div>	
</div>  