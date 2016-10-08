@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Editando o Produto: {{ $product->name }}</h3></div>
            <div class="panel-body">

                {!! Form::model($product,['route' => ['admin.produtos.alterar',$product->id]]) !!}

                    @include('errors._check')


                    @include('admin.produtos._form')

                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            {!! Form::submit('Salvar',['class' => 'btn btn-success'])  !!}
                        </div>
                    </div>


                {!! Form::close() !!}



            </div>
        </div>


    </div>




@endsection
