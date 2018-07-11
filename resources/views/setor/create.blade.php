@extends('layouts.template.master')

@section('content')


    <a href="{{ route('setor.create') }}"> </a>


    {!! Form::open(['route' => 'setor.store', 'class' => 'form-control']) !!}

    @include('setor._form')


    <div class="form-group col-md-5">
    {!! Form::submit('Cadastrar', ['class' => 'btn btn-success btn-sm']) !!}
    </div>
    {!! Form::close() !!}

@endsection

