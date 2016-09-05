@extends('layout.app')

@section('content')
<div class="container mukheroHack1">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Register</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('salvarUtilizador/'.$utilizador->id) }}">
                    {{ csrf_field() }}
                    <input id="utilizador_id" type="hidden" class="form-control" name="utilizador_id" value="{{$utilizador->id}}">
                    
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Nome</label>
                        <label for="nameValue" class="col-md-4 control-label">{{$utilizador->name}}</label>
                    </div>
                    
                    
                    <div class="form-group">
                        <div class="row">
                            <label for="tipo" class="col-md-4 control-label">Tipo de utilizador</label>
                            <div class="col-md-6">
                                {!! Form::select('tipo_utilizador', $tipo_utilizadores, $tipo_utilizador, ['class' => 'form-control', 'id' => 'tipo_utilizador']) !!} 
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>
                        
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" value="">
                            
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                        
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            
                            @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> Salvar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
