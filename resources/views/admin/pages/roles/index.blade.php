@extends('adminlte::page')

@section('title', 'Níveis de Acesso')

@section('content_header')
    <div class="container-fluid">
        @include('admin.includes.alerts')
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3>Listar</h3>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="{{ route('roles.create') }}" class="btn btn-outline-success btn-sm">Cadastrar</a>
            </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-body">
                        <table id="roles" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td class="text-center">
                                            <span class="d-none d-md-block">
                                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-outline-primary btn-sm">Visualizar</a>
                                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-warning btn-sm">Editar</a>
                                                    <form action="{{ route('roles.destroy', $role->id) }}" style="display:inline" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Deseja apagar o nível de acesso ?')" >Apagar</button>
                                                    </form>
                                            </span>
                                            <div class="dropdown d-block d-md-none">
                                                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Ações
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                                    <a href="{{ route('roles.show', $role->id) }}" class="dropdown-item">Visualizar</a>
                                                    <a href="{{ route('roles.edit', $role->id) }}" class="dropdown-item">Editar</a>
                                                    <button class="dropdown-item" onclick="return confirm('Deseja apagar o nível de acesso ?')">Apagar</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
                            <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
                            <script>
                                $(document).ready( function () {
                                    $('#roles').DataTable();
                                } );
                            </script>
                        </table>
                    </div>
            </div>
            </div>
        </div>
    </div>
@stop
