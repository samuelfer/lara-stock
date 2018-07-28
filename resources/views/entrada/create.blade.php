@extends('layouts.template.master')

@section('content')

    <div class="container-fluid">
        <div class="col-md-12">

        <div class="card card-default">
        <div class="card-header">
        <h5><i class='fa fa-key'></i> Cadastrar Entrada</h5>
        </div>

    <a href="{{ route('entrada.create') }}"> </a>
    <br>
    <br>

    {!! Form::open(['route' => 'entrada.store', 'class' => 'form-control']) !!}

    @include('entrada._form')

    <div class="form-group col-md-5">
    {!! Form::submit('Fechar pedido', ['class' => 'btn btn-success btn-sm']) !!}
    </div>
    {!! Form::close() !!}

        </div>
@endsection

