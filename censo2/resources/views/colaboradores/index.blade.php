<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{ url('colaborador') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="colaborador-nome" class="col-sm-3 control-label">Colaborador</label>

                <div class="col-sm-6">
                    <input type="text" name="nome" id="colaborador-nome" class="form-control">
                </div>
            </div>
            
            <row>
                <label for="colaborador-codigo" class="col-sm-3 control-label">Codigo</label>
                {{ Form::select('usersList', $users, ['class' => 'col-sm-6']) }}
            </row>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Salvar colaborador
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Current Tasks -->
    @if (count($colaboradores) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Colaboradores registados
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Nome do Colaborador</th>
                        <th>Codigo</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($colaboradores as $colaborador)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $colaborador->nome }}</div>
                                </td>
                                
                                <td class="table-text">
                                    <div>{{ $colaborador->codigo }}</div>
                                </td>

                                <!-- Delete Button -->
                                <td>
                                    <form action="{{ url('colaborador/'.$colaborador->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-task-{{ $colaborador->id }}" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Apagar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    
    <!-- Current Tasks -->
    @if (count($colaboradores2) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Colaboradores registados
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Nome do Colaborador</th>
                        <th>Codigo</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($colaboradores2 as $colaborador)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $colaborador->nome }}</div>
                                </td>
                                
                                <td class="table-text">
                                    <div>{{ $colaborador->user_id }}</div>
                                </td>

                                <!-- Delete Button -->
                                <td>
                                    <form action="{{ url('colaborador/'.$colaborador->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-task-{{ $colaborador->id }}" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Apagar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection