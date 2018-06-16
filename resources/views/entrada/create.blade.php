@extends('layouts.template.master')

@section('content')


                <a href="{{ route('entrada.create') }}"> </a>
                <br>
                <br>

                {!! Form::open(['route' => 'entrada.store', 'class' => 'form-control']) !!}

                @include('entrada._form')

                <div class="form-group col-md-5">
                {!! Form::submit('Cadastrar entrada', ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}


@endsection

