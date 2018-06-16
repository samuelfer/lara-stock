
@extends('layouts.template.master')

@section('content')

    {!! Form::model($sai, ['route' => ['saida.update','sai' => $sai->id], 'class' => 'form', 'method' => 'PUT']) !!}

    @include('saida._form')

    <div class="form-group col-md-5">
        {!! Form::submit('Salvar alterações', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}

@endsection
