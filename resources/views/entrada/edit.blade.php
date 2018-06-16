
@extends('layouts.template.master')

@section('content')

    {!! Form::model($ent, ['route' => ['entrada.update','ent' => $ent->id], 'class' => 'form', 'method' => 'PUT']) !!}

    @include('entrada._form')

    <div class="form-group col-md-5">
        {!! Form::submit('Salvar alterações', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}

@endsection
