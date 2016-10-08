@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Lista de Clientes</h3></div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <a href="{{ route(('admin.categorias.nova')) }}" class="btn btn-success">Nova</a><br/>
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Cód.:</th>
                        <th>Nome.:</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $categorie)
                        <tr>
                            <td>{{ $categorie->id }}</td>
                            <td>{{ $categorie->name }}</td>
                            <td>
                                <a href="{{ route('admin.categorias.editar',['id'=>$categorie->id]) }}" class="btn btn-primary">
                                    Editar
                                </a>
                                <a href="{{ route('admin.categorias.excluir',['id'=>$categorie->id]) }}" class="btn btn-danger">
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