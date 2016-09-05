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
               }
            });
         }
        </script>
        <div class=" form-group">	 
            {!! Form::label('lnome','Nome:', ['for' => 'nome' ]) !!}			    		
            {!! Form::text('nome',null,['class' => 'form-control', 'id' => 'nome']) !!}			    		
        </div>
    </div>	
</div> 