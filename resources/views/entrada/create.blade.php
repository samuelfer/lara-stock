@extends('layouts.template.master')

@section('content')


    <a href="{{ route('entrada.create') }}"> </a>
    <br>
    <br>

    {!! Form::open(['route' => 'entrada.store', 'class' => 'form-control']) !!}

    @include('entrada._form')

    <div class="form-group col-md-5">
    {!! Form::submit('Fechar pedido', ['class' => 'btn btn-success btn-sm']) !!}
    </div>
    {!! Form::close() !!}


@endsection

