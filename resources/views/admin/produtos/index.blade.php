@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Lista de Produtos</h3></div>
            <div class="panel-body">
                <a href="{{ route(('admin.produtos.nova')) }}" class="btn btn-success">Novo</a><br/>

                <div class="table-responsive">
                    <table class="table table-hover table-striped">

                        <thead>
                            <tr>
                                <th>Cód.</th>
                                <th>Nome.</th>
                                <th>Categoria</th>
                                <th>Valor</th>
                                <th>Ação</th>
                            </tr>

                        </thead>

                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>R$ {{ $product->price }}</td>
                                    <td>
                                        <a href="{{ route('admin.produtos.editar',['id'=>$product->id]) }}" class="btn btn-primary">
                                            Editar
                                        </a>
                                        <a href="{{ route('admin.produtos.excluir',['id'=>$product->id]) }}" class="btn btn-danger">
                                            Excluir
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        <tbody/>


                    </table>
                    {!! $products->render() !!}
                </div>

            </div>
        </div>


    </div>




@endsection
