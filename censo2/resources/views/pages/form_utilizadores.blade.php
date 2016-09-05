@extends('layout.app')
@section('content')
<div class="container mukheroHack2">
    <!-- Current Tasks -->
    @if (count($utilizadores) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Utilizadores
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Id</th>
                        <th>Nome do Utilizador</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th>Data de criacao</th>
                        <th>Data da ultima actualizacao</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($utilizadores as $utilizador)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $utilizador->id }}</div>
                                </td>
                                
                                <td class="table-text">
                                    <div>{{ $utilizador->name }}</div>
                                </td>
                                
                                <td class="table-text">
                                    <div>{{ $utilizador->email }}</div>
                                </td>
                                
                                <td class="table-text">
                                    <div>
                                        @if ( $utilizador->active==1)
                                            Activo
                                        @else
                                            Inactivo
                                        @endif
                                    </div>
                                </td>
                                
                                <td class="table-text">
                                    <div>{{ $utilizador->created_at }}</div>
                                </td>
                                
                                <td class="table-text">
                                    <div>{{ $utilizador->updated_at }}</div>
                                </td>
                                

                                <!-- Activate Button -->
                                <td>
                                    <form action="{{ url('utilizador/'.$utilizador->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('POST') }}

                                        <button type="submit" id="activate-user-{{ $utilizador->id }}" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>
                                            @if ( $utilizador->active==1)
                                                Desactivar
                                            @else
                                                Activar
                                            @endif
                                        </button>
                                    </form>
                                <!-- Update Button -->
                                    <form action="{{ url('utilizador/'.$utilizador->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('GET') }}

                                        <button type="submit" id="update-user-{{ $utilizador->id }}" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Alterar
                                        </button>
                                    </form>
                                <!-- Delete Button -->
                                    <form action="{{ url('utilizador/'.$utilizador->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-user-{{ $utilizador->id }}" class="btn btn-danger">
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
</div>
@stop