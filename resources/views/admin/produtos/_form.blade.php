<div class="form-group">
    {!!  Form::label('category', 'Categorias:', ['class' => 'col-sm-2 control-label text-right'])  !!}
    <div class="col-sm-10">
        {!! Form::select('category_id',$category, null, ['class' => 'form-control'])  !!}
    </div>
</div>


<div class="form-group">
    {!!  Form::label('name', 'Nome:', ['class' => 'col-sm-2 control-label text-right'])  !!}
    <div class="col-sm-10">
        {!! Form::text('name', null, ['class' => 'form-control'])  !!}
    </div>
</div>

<div class="form-group">
    {!!  Form::label('description', 'Descrição:', ['class' => 'col-sm-2 control-label text-right'])  !!}
    <div class="col-sm-10">
        {!! Form::textArea('description', null, ['class' => 'form-control'])  !!}
    </div>
</div>

<div class="form-group">
    {!!  Form::label('price', 'Preço:', ['class' => 'col-sm-2 control-label text-right'])  !!}
    <div class="col-sm-10">
        {!! Form::text('price', null, ['class' => 'form-control'])  !!}
    </div>
</div>
