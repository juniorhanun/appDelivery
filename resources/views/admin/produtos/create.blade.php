@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Criar Produtos</h3></div>
            <div class="panel-body">

                {!! Form::open(['route' => 'admin.produtos.salvar','files' => true]) !!}

                @include('errors._check')

                @include('admin.produtos._form')

                <div class="form-group">
                    {!!  Form::label('img', 'Imagem:', ['class' => 'col-sm-2 control-label text-right'])  !!}
                    <div class="col-sm-10">
                        {!! Form::file('img', null, ['class' => 'form-control'])  !!}
                    </div>
                </div>

                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            {!! Form::submit('Enviar',['class' => 'btn btn-success'])  !!}
                        </div>
                    </div>


                {!! Form::close() !!}



            </div>
        </div>


    </div>




@endsection
