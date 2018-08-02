
@extends('layouts.template.master')

@section('content')

    {!! Form::model($data, ['route' => ['entrada.update','ent' => $data->id], 'class' => 'form', 'method' => 'PUT']) !!}

    @include('entrada._form')

    <div class="form-group col-md-5">
        {!! Form::submit('Salvar alterações', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}

@endsection
