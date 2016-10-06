@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Lista de Clientes</h3></div>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Cód.:</th>
                            <th>Nome.:</th>
                            <th>Email.:</th>
                            <th>Telefone.:</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phpone }}</td>
                                <td>
                                    <a href="{{ route('admin.clientes.editar',['id'=>$user->id]) }}" class="btn btn-primary">
                                        Editar
                                    </a>
                                    <a href="{{ route('admin.clientes.excluir',['id'=>$user->id]) }}" class="btn btn-danger">
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection