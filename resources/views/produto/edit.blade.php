
@extends('layouts.template.master')

@section('content')
<div class="container-fluid">
    {!! Form::model($prod, ['route' => ['produto.update','forn' => $prod->id], 'class' => 'form', 'method' => 'PUT']) !!}

    @include('produto._form')

    <div class="form-group col-md-5">
        {!! Form::submit('Salvar alterações', ['class' => 'btn btn-success btn-sm']) !!}
    </div>
    {!! Form::close() !!}
</div>
@endsection
