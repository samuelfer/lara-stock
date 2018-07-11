@extends('layouts.template.master')

@section('content')


    <a href="{{ route('produto.create') }}"> </a>
    <br>
    <br>

    {!! Form::open(['route' => 'produto.store', 'class' => 'form-control']) !!}

    @include('produto._form')

    <div class="form-group col-md-5">
    {!! Form::submit('Cadastrar produto', ['class' => 'btn btn-success btn-sm']) !!}
    </div>
    {!! Form::close() !!}


@endsection

