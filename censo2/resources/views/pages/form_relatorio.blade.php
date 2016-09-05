@extends('layout.app')
@section('content')
        <div class="container mukheroHack2">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Utilizador</th>
                        <th>{{date('d/m/Y',strtotime("-0 days"))}}</th>
                        <th>{{date('d/m/Y',strtotime("-1 days"))}}</th>
                        <th>{{date('d/m/Y',strtotime("-2 days"))}}</th>
                        <th>{{date('d/m/Y',strtotime("-3 days"))}}</th>
                        <th>{{date('d/m/Y',strtotime("-4 days"))}}</th>
                        <th>{{date('d/m/Y',strtotime("-5 days"))}}</th>
                        <th>{{date('d/m/Y',strtotime("-6 days"))}}</th>
                        
                        <th>Total de funcionarios</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($utilizadores as $utilizador)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $utilizador->name }}</div>
                                </td>
                                
                                <td class="table-text">
                                    <div>{{ count($utilizador->FuncionariosCreatedAt(date('Y-m-d',strtotime("-0 days")))) }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ count($utilizador->FuncionariosCreatedAt(date('Y-m-d',strtotime("-1 days")))) }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ count($utilizador->FuncionariosCreatedAt(date('Y-m-d',strtotime("-2 days")))) }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ count($utilizador->FuncionariosCreatedAt(date('Y-m-d',strtotime("-3 days")))) }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ count($utilizador->FuncionariosCreatedAt(date('Y-m-d',strtotime("-4 days")))) }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ count($utilizador->FuncionariosCreatedAt(date('Y-m-d',strtotime("-5 days")))) }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ count($utilizador->FuncionariosCreatedAt(date('Y-m-d',strtotime("-6 days")))) }}</div>
                                </td>
                                
                                
                                <td class="table-text">
                                    <div>{{ count($utilizador->FuncionariosCreated()->get()) }}</div>
                                </td>

                                <!-- Delete Button -->
                                <td>
                                    <form action="{{ url('colaborador/'.$utilizador->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-task-{{ $utilizador->id }}" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Apagar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
@stop
