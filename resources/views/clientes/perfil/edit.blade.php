@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editando o Perfil.:</div>
                <div class="panel-body">
                    {!! Form::model($user,['route' => ['cliente.perfil.gravar',$user->id]]) !!}

                        @include('errors._check')

                        <div class="form-group">
                            {!!  Form::label('name', 'Nome:', ['class' => 'col-sm-2 control-label text-right'])  !!}
                            <div class="col-sm-10">
                                {!! Form::text('name', null, ['class' => 'form-control'])  !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!  Form::label('email', 'Email:', ['class' => 'col-sm-2 control-label text-right'])  !!}
                            <div class="col-sm-10">
                                {!! Form::text('email', null, ['class' => 'form-control'])  !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!  Form::label('phpone', 'Telefone:', ['class' => 'col-sm-2 control-label text-right'])  !!}
                            <div class="col-sm-10">
                                {!! Form::text('phpone', null, ['class' => 'form-control'])  !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!  Form::label('zipcode', 'Cep:', ['class' => 'col-sm-2 control-label text-right'])  !!}
                            <div class="col-sm-10">
                                {!! Form::text('zipcode', null, ['class' => 'form-control'])  !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!  Form::label('state', 'Estado:', ['class' => 'col-sm-2 control-label text-right'])  !!}
                            <div class="col-sm-10">
                                {!! Form::text('state', null, ['class' => 'form-control'])  !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!  Form::label('city', 'Cidade:', ['class' => 'col-sm-2 control-label text-right'])  !!}
                            <div class="col-sm-10">
                                {!! Form::text('city', null, ['class' => 'form-control'])  !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!!  Form::label('address', 'Endereço:', ['class' => 'col-sm-2 control-label text-right'])  !!}
                            <div class="col-sm-10">
                                {!! Form::text('address', null, ['class' => 'form-control'])  !!}
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
    </div>
</div>
@endsection


