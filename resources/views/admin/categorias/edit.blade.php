@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3>Editando a Categoria: {{ $category->name }}</h3></div>
            <div class="panel-body">

                {!! Form::model($category,['route' => ['admin.categorias.alterar',$category->id]]) !!}

                    @include('errors._check')


                    <div class="form-group">
                        {!!  Form::label('name', 'Nome:', ['class' => 'col-sm-2 control-label text-right'])  !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', null, ['class' => 'form-control'])  !!}
                        </div>

                    </div>

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
